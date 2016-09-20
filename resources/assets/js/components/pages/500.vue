<template>
<div id="container" class="cls-container">
    
    <div class="cls-header">
        <div class="cls-brand">
            <a class="box-inline" href="index.html">
                <span class="brand-title">Nifty <span class="text-thin">Admin</span></span>
            </a>
        </div>
    </div>
    
    <div class="cls-content">
        <h1 class="error-code text-danger">500</h1>
        <p class="h4 text-thin pad-btm mar-btm">
            <i class="fa fa-cog fa-fw"></i>
            Something went wrong and server couldn't process your request.
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