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
                            <div class="col-xs-12 col-sm-5 col-md-3 mar-btm">
                                <div class="img-container mar-btm">
                                    <img id="image" width="100%" src="http://gravatar.duoshuo.com/avatar/5a068d901fda4a0d6f29a9ab04419157">
                                </div>
                                <div class="btn-container">
                                    <div class="btn-group">
                                        <label class="btn btn-warning btn-labeled fa fa-repeat fa-lg" for="inputImage"><input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">Reseter</label>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-labeled fa fa-cloud-upload fa-lg" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 80, &quot;height&quot;: 80 }">Confirm</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-9 mar-btm">
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-star fa-lg"></i></span>
                                    <input type="text" v-model="form.name"class="form-control" placeholder="Name">
                                </div>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-star fa-lg"></i></span>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-star fa-lg"></i></span>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-star fa-lg"></i></span>
                                    <input type="text" class="form-control" placeholder="Name">
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
                    <div class="row">
                        <div class="col-xs-12"><pre>{{ form | json }}</pre></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import { addItem, setForm } from '../../vuex/actions'
    import { form } from '../../vuex/getters'

    export default {
        vuex: {
            actions: {
                addItem: addItem,
                setForm: setForm
            },
            getters: {
                form: form
            }
        },
        ready() {
            var self = this;
            $("#editor").summernote({
                height:250,
                callbacks: {
                    onChange(contents) {
                        self.setForm({content: contents})
                        jsPanel.closeChildpanels()
                        $.jsPanel({
                            position: {my: "left-bottom",at: "left-bottom"},
                            contentSize: {width: 300,height: 200},
                            content: contents,
                            headerTitle: 'Preview',
                            theme: "info",
                            headerLogo: '&nbsp;<i class="fa fa-eye fa-lg"></i>',
                            resizable: {aspectRatio:true,maxWidth:300}
                        })
                    }
                }
                
            })

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
</style>