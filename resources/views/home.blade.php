@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description ">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Webpage Title</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
    @vite(['resources/css/home.css'])
</head>

    <div class="container grid">
        <div class="text-container">
            <h1 class="h1-large">Welcome To Our Page</h1>
            <p>A client management system (CMS) is a software platform that helps businesses manage 
                their interactions with clients or customers.At its core, a CMS is designed to help 
                businesses build and maintain strong relationships with their clients. This is achieved 
                through features such as contact management, lead tracking, and customer segmentation™</p>
            <form action="" method="">
                <div class="form-group">
                    <input type="email" class="form-control"  placeholder="Search">
                </div>
                <button type="submit" class="form-control-submit-button">Subscribe</button>
            </form>
        </div> <!-- end of text-container -->
        <div class="image-container">
            <img src="/images/logo.png" alt="maker">
        </div> <!-- end of image-container -->
    </div> <!-- end of container -->


@endsection
