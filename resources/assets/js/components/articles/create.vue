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
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Article</h3>
                </div>
    
                <form class="form-horizontal">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-5 col-md-4 mar-btm">
                                <div class="img-container mar-btm">
                                    <img id="image" width="100%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWBAMAAADOL2zRAAAAG1BMVEUyQE7////Lz9Kyt7zl5+hLV2SYn6Zlb3p+h5C1Qm8QAAABi0lEQVRoge2TvW/CMBDFLwTijD1jSMakSj9GIrXqmgCqGKFEnYNE9wBDV+hfXtuQdCqp1HZp30+K7l7sPPucMxEAAAAAAAAAAAAAAOAv0Rn9nJeT/Y7XI62/5Wy9nhOeVESy4KgRhbUd62cX8/Vcx2WuHlq9PFaXPCSa8v2HyEsznJa0ZJlwn8jnccJlm9dqNieREMUhNUIoO1wMKJ5pnzyibkC0zVq8hJof83RPjXBDG7yhL82LIiQnOFvg0cu1k/yMVvqYatEZ2GEhO8ExksvypdWrazeuPz5or1o4F8dxdUp0yW/MV21eTmSSxYA2usZa1L2iTok5PrHm6kv7Sge0KKkRp+30ZNcWK/pWplGLlz0ijwNyRtQIc0yHPXl9T5ppRShMrCv/1EuoSv90ObT11cJXlc8hbYJefmN6YiRY98YmO+dlajro7pSvkrpm1VqkKlc81c35dOrVLauE9+e8XL2X3p25NQl5ZtVa+LGs3vhWv9nlPJnb2HKHAAAAAAAAAAAAAAAA/5d3QBw11isRkt4AAAAASUVORK5CYII=">
                                </div>
                                <div class="btn-container">
                                    <div class="btn-group">
                                        <label class="btn btn-info btn-labeled fa fa-upload fa-lg" for="inputImage"><input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">Selects</label>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-mint btn-labeled fa fa-check fa-lg" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 80, &quot;height&quot;: 80 }">Confirm</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-8 mar-btm">
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-book fa-lg"></i></span>
                                    <input type="text" v-model="form.name" class="form-control" placeholder="Name">
                                </div>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-leaf fa-lg"></i></span>
                                    <input type="text" v-model="form.description" class="form-control" placeholder="Description">
                                </div>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-random fa-lg"></i></span>
                                    <select id="types" data-placeholder="Choose a Type..." multiple tabindex="4">
                                        <optgroup v-for="category in categorys" :label="category.name">
                                            <option v-for="type in category.types" :value="type.id"> {{{type.icon}}} {{type.name}}</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tags fa-lg"></i></span>
                                    <input type="text" v-model="form.tags" class="form-control" placeholder="Add a tag..." value="Larawos" data-role="tagsinput">
                                </div>
                                <div style="margin:7px 0">
                                    <div class="btn-group mar-rgt">
                                        <label class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.source" value="0" type="radio" name="source"> Republish</label>
                                        <label class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.source" value="1" type="radio" name="source"> Original</label>
                                    </div>
                                    <div class="btn-group mar-rgt">
                                        <label class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.payment" value="0" type="radio" name="payment"> Free</label>
                                        <label class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.payment" value="1" type="radio" name="payment"> Membership</label>
                                        <label class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.payment" value="2" type="radio" name="payment"> Charge</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="btn-group">
                                        <label class="mar-no form-checkbox form-icon btn btn-info btn-labeled"><input v-model="form.traits" value="0" type="checkbox" name="traits"> Support</label>
                                        <label class="mar-no form-checkbox form-icon btn btn-info btn-labeled"><input v-model="form.traits" value="1" type="checkbox" name="traits"> Simple</label>
                                        <label class="mar-no form-checkbox form-icon btn btn-info btn-labeled"><input v-model="form.traits" value="2" type="checkbox" name="traits"> Light</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12"><div id="editor"></div></div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button @click="$router.go({name: 'content.article.index'})" type="button" class="btn btn-warning btn-labeled fa fa-reply fa-lg">Cancel</button>
                        <button @click="addItem('article', form)" type="button" class="btn btn-primary btn-labeled fa fa-send fa-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="preview-container pad-rgt pad-btm">
    <div class="panel panel-info mar-no">
        <div class="panel-heading">
            <div class="panel-control">
                <button class="btn btn-default" data-target="#preview-content" data-toggle="collapse"><i class="fa fa-chevron-down"></i></button>
                <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
            </div>
            <h3 class="panel-title" style="padding-left:0">
            <div class="preview-thumb pad-hor"><img class="img-xs" onerror="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWBAMAAADOL2zRAAAAG1BMVEUyQE7////Lz9Kyt7zl5+hLV2SYn6Zlb3p+h5C1Qm8QAAABi0lEQVRoge2TvW/CMBDFLwTijD1jSMakSj9GIrXqmgCqGKFEnYNE9wBDV+hfXtuQdCqp1HZp30+K7l7sPPucMxEAAAAAAAAAAAAAAOAv0Rn9nJeT/Y7XI62/5Wy9nhOeVESy4KgRhbUd62cX8/Vcx2WuHlq9PFaXPCSa8v2HyEsznJa0ZJlwn8jnccJlm9dqNieREMUhNUIoO1wMKJ5pnzyibkC0zVq8hJof83RPjXBDG7yhL82LIiQnOFvg0cu1k/yMVvqYatEZ2GEhO8ExksvypdWrazeuPz5or1o4F8dxdUp0yW/MV21eTmSSxYA2usZa1L2iTok5PrHm6kv7Sge0KKkRp+30ZNcWK/pWplGLlz0ijwNyRtQIc0yHPXl9T5ppRShMrCv/1EuoSv90ObT11cJXlc8hbYJefmN6YiRY98YmO+dlajro7pSvkrpm1VqkKlc81c35dOrVLauE9+e8XL2X3p25NQl5ZtVa+LGs3vhWv9nlPJnb2HKHAAAAAAAAAAAAAAAA/5d3QBw11isRkt4AAAAASUVORK5CYII=" :src="form.thumb"></div>
            {{ form.name }}
            </h3>
        </div>
        <div id="preview-content" class="collapse">
            <div class="panel-body">
                {{{ form.content }}}
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import { addItem, setForm } from '../../vuex/actions'
    import { getForm, getCategorys } from '../../vuex/getters'

    export default {
        vuex: {
            actions: {
                addItem: addItem,
                setForm: setForm
            },
            getters: {
                form: getForm,
                categorys: getCategorys
            }
        },
        ready() {
            var self = this;
            $('#types').chosen({width:'100%'}).change(function(){
                self.setForm({types: $(this).val()})
            });
            $('input').on('itemAdded', function(event) {});
            $("#editor").summernote({height:300,callbacks: {onChange(contents) {
                self.setForm({content: contents})
            }}})
            var $image = $('#image'),
            options = {
                aspectRatio: 1,
                preview: '.img-preview',
                minCropBoxWidth: 80,
                minCropBoxHeight: 80
            };
            $image.cropper(options);
            // Methods
            $(document.body).on('click', '[data-method]', function() {
                if ($(this).data().method && $(this).data().method === 'getCroppedCanvas') {
                        self.setForm({thumb: $image.cropper($(this).data().method, $(this).data().option).toDataURL('image/jpeg')})
                    }
            });
            // Import image
            var $inputImage = $('#inputImage'),
            URL = window.URL || window.webkitURL,
            blobURL;
            if (URL) {
                $inputImage.change(function() {
                    var files = this.files,
                    file;
                    if (files && files.length) {
                        file = files[0];
                        if (/^image\/\w+$/.test(file.type)) {
                            blobURL = URL.createObjectURL(file);
                            $image.one('built.cropper', function() {
                                URL.revokeObjectURL(blobURL); // Revoke when load complete
                            }).cropper('reset', true).cropper('replace', blobURL);
                            $inputImage.val('');
                        } else {
                            showMessage('Please choose an image file.');
                        }
                    }
                });
            } else {
                $inputImage.parent().remove();
            }
        }
    }
</script>

<style>
.img-container {
  height:200px;
  width:200px;
  overflow:hidden;
}
.preview-container {
  position:fixed;
  top:0;
  z-index:999;
  width:25%;
}
.preview-thumb {
    float:left;
}
#preview-content {
  max-height: 150px;
  overflow-y:auto;
  overflow-wrap: break-word;
}
</style>