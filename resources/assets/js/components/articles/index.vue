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
    <li class="active">Index</li>
</ol>

<div id="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-control">
                        <a class="fa fa-question-circle fa-lg fa-fw unselectable add-tooltip" href="javascript:void(0);" data-original-title="<h4 class='text-thin'>Information</h4><p style='width:150px'>This is an information bubble to help the user.</p>" data-html="true" title=""></a>
                    </div>
                    <h3 class="panel-title">Article</h3>
                </div>
    
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <button @click="setArticles()" class="btn btn-purple btn-labeled fa fa-plus">Add{{ counterValue }}</button>
                                <div class="btn-group btn-group">
                                    <button class="btn btn-default"><i class="fa fa-exclamation-circle"></i></button>
                                    <button class="btn btn-default"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                </div>
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            <i class="fa fa-cog"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0);">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:4ex">ID</th>
                                    <th>Name</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="article in articles.data">
                                    <td><a v-link="{name: 'content.article.show', params: {id: article.id}}" class="btn-link">{{article.id}}</a></td>
                                    <td>{{article.name}}</td>
                                    <td class="text-center"><span class="label label-table label-success">Laravel</span></td>
                                    <td class="text-right">
                                        <a class="btn btn-xs btn-default add-tooltip" data-toggle="tooltip" v-link="{name: 'content.article.edit', params: {id: article.id}}" data-original-title="Edit" data-container="body"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger add-tooltip"  data-toggle="tooltip" href="javascript:void(0);" @click="delItem('article', article.id)" data-original-title="Delete" data-container="body"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import { getArticles } from '../../vuex/getters'
    import { setLists, delItem } from '../../vuex/actions'

    export default {
        vuex: {
            actions: {
                setLists: setLists,
                delItem: delItem
            },
            getters: {
                articles: getArticles
            }
        },
        ready() {

        }
    }
</script>