<template>
  <a
    v-on:click="sendEmail"
    aria-label="send me an email"
    tabindex="0"
    :class="[
      isButton ? 'button is-dark is-outlined' : 'has-text-white',
    ]"
  >
    <i :class="[
      'far fa-envelope',
      isButton ? '' : 'has-text-primary',
    ]"></i>
    Email
  </a>
</template>

<script>
export default {
  props: {
    isButton: ""
  },
  methods: {
    sendEmail(event) {
      event.preventDefault();
      let encodedEmail = atob(contact);
      let email = encodedEmail.replace(/_/g, "@");
      window.location = "mailto:" + email;
      return false;
    }
  }
};
</script>
<style  scoped>
i {
  margin-right: 5px;
}
button {
  width: 150px;
}
</style>
