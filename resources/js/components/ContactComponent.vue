<template>
  <form id="contact-form" @submit.prevent="onSubmit">
    <div class="notification is-success" v-if="messageSent">
      <button type="button" class="delete" v-on:click="closeNotification"></button>
      Message sent. I will get back to you as soon as possible.
    </div>
    <div class="notification is-danger" v-focus v-if="hasErrors" tabindex="0">
      <button type="button" class="delete" v-on:click="closeNotification"></button>
      <ul>
        <li tabindex="0" v-if="errors && errors.email" class="has-text-white">{{ errors.email[0] }}</li>
        <li
          tabindex="0"
          v-if="errors && errors.message"
          class="has-text-white"
        >{{ errors.message[0] }}</li>
        <li tabindex="0" v-if="errors && errors.name" class="has-text-white">{{ errors.name[0] }}</li>
      </ul>
    </div>
    <div class="field">
      <label class="label has-text-white">Name</label>
      <div class="control">
        <input class="input" v-model="fields.name" type="text" placeholder="Enter your name" />
      </div>
    </div>

    <div class="field">
      <label class="label has-text-white">Email</label>
      <div class="control has-icons-left has-icons-right">
        <input
          class="input"
          type="email"
          v-model="fields.email"
          placeholder="Enter your email"
          value
        />
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
      </div>
    </div>
    <div class="field">
      <label class="label has-text-white">Message</label>
      <div class="control">
        <textarea
          aria-label="Enter your message"
          class="textarea"
          v-model="fields.message"
          placeholder="message"
        ></textarea>
      </div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button type="submit" role="button" class="button is-primary">Submit</button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      fields: { name: "", email: "", message: "" },
      errors: {},
      messageSent: false,
      hasErrors: false
    };
  },
  directives: {
    focus: {
      // directive definition
      inserted: function(el) {
        el.focus();
      }
    }
  },
  methods: {
    closeNotification() {
      this.messageSent = false;
    },
    onSubmit() {
      this.errors = {};
      axios
        .post("/contact", this.fields)
        .then(response => {
          if (response.status === 200) {
            this.fields.name = "";
            this.fields.email = "";
            this.fields.message = "";
            this.messageSent = true;
          }
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
            this.hasErrors = true;
          } else {
            alert(error);
          }
        });
    }
  }
};
</script>