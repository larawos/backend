<template>
<div id="container" class="cls-container">
    
    <div class="cls-header">
        <div class="cls-brand">
            <a class="box-inline" href="index.html">
                <!-- <img alt="Nifty Admin" src="images/logo.png" class="brand-icon"> -->
                <span class="brand-title">Nifty <span class="text-thin">Admin</span></span>
            </a>
        </div>
    </div>
    
    <div class="cls-content">
        <h1 class="error-code text-warning">404</h1>
        <p class="h4 text-thin pad-btm mar-btm">
            <i class="fa fa-exclamation-circle fa-fw"></i>
            Sorry, but the page you are looking for has not been found on our server.
        </p>
        <div class="row mar-btm">
            <form class="col-xs-12 col-sm-10 col-sm-offset-1" method="post" action="pages-search-results.html">
                <input type="text" placeholder="Search.." class="form-control input-lg error-search">
            </form>
        </div>
        <br>
        <div class="pad-top"><a class="btn-link" v-link="{name: 'dashboard'}">Back to Homepage</a></div>
    </div>
    
</div>
</template>
