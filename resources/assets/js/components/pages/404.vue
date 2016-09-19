<template>
<div id="page-title">
    <h1 class="page-header text-overflow">404</h1>
    <!--Searchbox-->
    <div class="searchbox">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
                <button class="text-muted" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
</div>

<ol class="breadcrumb">
    <li><a v-link="{ name: 'dashboard' }">Dashboard</a></li>
    <li class="active">404</li>
</ol>

<div id="page-content">
    <div class="row">
        <div class="col-sm-12">

            <!--Dark Panel-->
            <!--===================================================-->
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">404</h3>
                </div>

                <div class="panel-body">
                    <p><i class="fa fa-exclamation-circle fa-fw"></i>Sorry, but the page you are looking for has not been found on our server. Click here <a class="btn-link" v-link="{ name: 'dashboard' }">back to dashboard</a>.</p>

                    <div class="row mar-btm mar-top">
                        <form class="col-xs-12 col-sm-10 col-sm-offset-1" method="post" action="pages-search-results.html">
                            <input type="text" placeholder="Search.." class="form-control input-lg error-search">
                        </form>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End Dark Panel-->

        </div>
    </div>
</div>
</template>
