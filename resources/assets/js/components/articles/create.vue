<template>
<div id="page-title">
    <h1 class="page-header text-overflow">Article</h1>

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
    <li><a v-link="{ name: 'content.article.index' }">Article</a></li>
    <li class="active">Create</li>
</ol>

<div id="page-content">
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item" v-for="article in articles">
                    {{ article.name }}
                </li>
            </ul>
        </div>
    </div>
</div>
</template>