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
    <li class="active">Edit</li>
</ol>

<div id="page-content">
    <div class="row">
        <div class="col-md-8">
            <h3>{{ article.name }}</h3>
            <pre>{{ article.content }}</pre>
        </div>
    </div>
</div>
</template>

<script>
    import { findArticle } from '../../vuex/getters'
    import { setItem } from '../../vuex/actions'

    export default {
        vuex: {
            actions: {
                setItem: setItem
            },
            getters: {
                article: findArticle
            }
        },
        ready() {
            this.setItem('article', this.$route.params.id)
        }
    }
</script>