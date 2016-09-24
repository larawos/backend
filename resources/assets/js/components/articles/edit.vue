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
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Article</h3>
                </div>
    
                <form class="form-horizontal">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 mar-btm">
                                <div class="img-container mar-btm">
                                    <img id="image" width="170" :src="form.thumb">
                                </div>
                                <div class="btn-container">
                                    <div class="btn-group">
                                        <label class="btn btn-info btn-labeled fa fa-upload fa-lg" for="inputImage"><input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">Reset</label>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-mint btn-labeled fa fa-check fa-lg" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 80, &quot;height&quot;: 80 }">Crop</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 mar-btm">
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
                                            <option v-for="type in category.types" :value="type.id">{{type.name}}</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-tags fa-lg"></i></span>
                                    <input type="text" v-model="form.tags" class="form-control" placeholder="Add a tag..." data-role="tagsinput">
                                </div>
                                <div class="btn-group mar-rgt">
                                    <label :class="{'active' : form.source == 0}" class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.source" value="0" type="radio" name="source"> Republish</label>
                                    <label :class="{'active' : form.source == 1}" class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.source" value="1" type="radio" name="source"> Publish</label>
                                </div>
                                <div class="btn-group">
                                    <label :class="{'active' : form.payment == 0}" class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.payment" value="0" type="radio" name="payment"> Free</label>
                                    <label :class="{'active' : form.payment == 1}" class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.payment" value="1" type="radio" name="payment"> Membership</label>
                                    <label :class="{'active' : form.payment == 2}" class="mar-no form-radio form-icon btn btn-labeled btn-mint"><input v-model="form.payment" value="2" type="radio" name="payment"> Charge</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12"><textarea id="editor"></textarea></div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button @click="$router.go({name: 'content.article.index'})" type="button" class="btn btn-warning btn-labeled fa fa-reply fa-lg">Cancel</button>
                        <button @click="editItem('article', form.id, form)" type="button" class="btn btn-primary btn-labeled fa fa-send fa-lg">Submit</button>
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
            <div class="preview-thumb pad-hor"><img class="img-xs" :src="form.thumb"></div>
            {{ form.name }}
            </h3>
        </div>
        <div id="preview-content" class="collapse">
            <div class="panel-body">
                <pre>{{{ form | json }}}</pre>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import { editItem, setForm } from '../../vuex/actions'
    import { getForm, getCategorys, findArticle } from '../../vuex/getters'

    export default {
        vuex: {
            actions: {
                editItem: editItem,
                setForm: setForm
            },
            getters: {
                form: getForm,
                categorys: getCategorys
            }
        },
        ready() {
            var self = this;
            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput({maxTags:3, maxChars:8, trimValue: true})
            $('#types').chosen({width:'100%'}).change(function(){
                self.setForm({types: $(this).val()})
            });
            $("#editor").summernote({height:300,callbacks: {onChange(contents) {
                self.setForm({content: contents})
            }}})
            var $image = $('#image'),
            options = {
                aspectRatio: 1,
                preview: '.img-preview',
                minCropBoxWidth: 80,
                minCropBoxHeight: 80,
                minContainerWidth: 170,
                minContainerHeight: 170
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