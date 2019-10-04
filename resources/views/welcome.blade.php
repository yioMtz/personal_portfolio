@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight bg2" id="welcome-section">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
               
            </div>
        
            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title has-text-white is-size-1" tabindex="0">
                        Hi, I'm <span class="has-text-primary">{{ str_replace('_',' ',config('app.developer')) }}</span>
                    </h1>
                    <h2 class="subtitle is-size-3" tabindex="0">
                        a full-stack web developer
                    </h2>     
                    
                    <a href="#" data-link="#projects"  class="button is-outlined is-large is-primary closeNav">View My portfolio</a>
                </div>
            </div>
        
            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot">
                <nav class="tabs">
                    <div class="container">
                        <ul>
                            @foreach($bio->links as $link)
                            <li><a href="{{ $link->profile }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $link->platform }}" class="has-text-white"><i class="{{ $link->icon }} has-text-primary"></i>{{ $link->platform }}</a></li>
                            @endforeach
                            <li><emailbtn-component></emailbtn-component></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <a class="icon is-large chev-icons closeNav" aria-label="view my portfolio" href="#" data-link="#projects">
                <i class="fas fa-chevron-down fas fa-3x chevron"></i>
                <i class="fas fa-chevron-down fas fa-3x chevron"></i>
            </a>
        </section>
         <section class="section nav-section is-paddingless">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <div class="navbar-item has-text-primary brand-title">
                             {{ config('app.name', 'Laravel') }}
                        </div>
                
                        <a role="button" class="navbar-burger burger has-text-white" aria-label="menu" aria-expanded="false"
                            data-target="navbarBasicExample">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                
                    </div>
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-end">
                            <a class="navbar-item has-text-white closeNav"  aria-label="Home link" href="#" data-link="#welcome-section">
                                Home
                            </a>
                
                            <a class="navbar-item has-text-white closeNav"  aria-label="go to portfolio" href="#" data-link="#projects">
                                My Work
                            </a>
                
                            <a class="navbar-item has-text-white closeNav"  aria-label="about me" href="#" data-link="#about">
                                about
                            </a>
                            <div class="navbar-item">
                                <div class="buttons">
                                    <a class="button is-primary closeNav"  aria-label="contact me" href="#" data-link="#contact">
                                        <strong>Contact</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </nav>
        </section>
        <section id="projects" class="hero has-navbar-fixed-top has-background-white">
            <div class="container has-text-centered">
                <h1 class="section-headline">
                    Portfolio
                </h1>
                <div class="tabs is-centered">
                    <ul>
                        <li class="is-active">
                            <a class="color-secondary-2-3" style="color:#63AAC0;">
                                <span class="icon is-small"><i class="fas fa-globe" aria-hidden="true"></i></span>
                                <span>Web</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="color-secondary-2-3">
                                <span class="icon is-small"><i class="fas fa-phone" aria-hidden="true"></i></span>
                                <span>Mobile</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="columns is-desktop">
                    @foreach($projects as $project)
                    <div class="column has-text-centered">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image">
                                    <img src="https://via.placeholder.com/150" alt="{{ $project->title }}">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="{{ $project->icon }} is-size-1"></i>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">{{ $project->title }}</p>
                                        <p class="subtitle is-6"><a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer" aria-label="link to {{ $project->title }}"><i class="fas fa-globe" style="margin-right:5px;"></i>Visit Site</a></p>
                                    </div>
                                </div>
            
                                <div class="content">
                                    <p class="has-text-left">
                                       {{ $project->description }}
                                    </p>
                                </div>
                            </div>
                            <p class="p-date"><i class="fas fa-calendar-alt"></i>{{ $project->year }}</p>
                            <p class="p-techs is-7">{{ $project->techs }}</p>
                        </div>
                    </div>
                          @endforeach       
                </div>
            </div>
        </section>

        <section class="section has-navbar-fixed-top" id="about">
            <div class="container has-text-centered">
                <h1 class="section-headline" tabindex="0">
                    About
                </h1>
                <div class="columns">
                    <div class="column">
                        <figure class="image">
                            <img src="https://via.placeholder.com/150">
                        </figure>
                        <br>
                        <div class="has-text-justified" tabindex="0">
                           @if(!empty($bio))
                           {!! $bio->bio !!}
                           @endif
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div class="columns is-multiline is-mobile">
                            <div class="column is-4 is-half-mobile">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4 is-half-mobile">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                            <div class="column is-4">
                                <figure class="image is-128x128">
                                    <img class="" src="https://via.placeholder.com/150">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section has-navbar-fixed-top" id="contact" role="region" aria-label="Contact me section">
            <div class="container" >
                <div class="has-text-white contact-title">
                    <h1 tabindex="0">
                        Thanks for taking the time to reach out. <br><small>How can I help you today?</small>
                    </h1>
                </div>
                <div class="level">
                    <div class="column is-three-quarters">
                        <contact-component></contact-component>
                    </div>
                    <div class="column" id="contact-form-btns">    
                        <figure class="image">
                            <img src="https://via.placeholder.com/150">
                        </figure>
                        @foreach($bio->links as $link)
                            <a href="{{ $link->profile }}" 
                            rel="noopener noreferrer" 
                            class="button is-dark is-outlined" 
                            target="_blank"
                            aria-label="{{ $link->platform }}"><i
                            class="{{ $link->icon }}"></i>{{ $link->platform }}</a>
                            @endforeach
                            <emailbtn-component is-button="true"></emailbtn-component>
                    </div>
                </div>
            </div>
        </section>

         <footer class="section" id="footer">
            <div class="content has-text-centered has-text-white">
                <a href="https://bulma.io">
                    <img src="https://via.placeholder.com/150" alt="Made with Bulma" width="128" height="24">
                </a>
                <p>Copyright © {{ date('Y') }}&nbsp; {{ config('app.name', 'Laravel') }}&nbsp;•&nbsp;footer note</p>
            </div>
        </footer>
@endsection
