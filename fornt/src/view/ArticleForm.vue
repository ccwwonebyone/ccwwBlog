<template>
<el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>markdown</span>
    </div>
<el-form ref="form" :model="form" label-width="80px">
  <el-form-item label="标题">
    <el-input v-model="form.title"></el-input>
  </el-form-item>
  <el-form-item label="所属分类">
    <el-select v-model="form.category_id" placeholder="选择分类">
      <template v-for="category in categorys" >
        <el-option v-if="category.pid != 0" v-bind:label="category.name"
                  v-bind:value="category.id" style="padding-left: 50px"></el-option>
        <el-option v-else v-bind:label="category.name" v-bind:value="category.id" :disabled="!category.select"></el-option>
      </template>
    </el-select>
  </el-form-item>
    <el-form-item label="标签">
    <el-autocomplete style="width: 240px;"
      popper-class="tag-autocomplete"
      :fetch-suggestions="querySearch"
      placeholder="输入后回车确认"
      v-model="newTag"
      @keyup.enter.native="handleInputConfirm"
      @select="handleSelect">
      <template slot-scope="{ item }">
        <span class="tag-name">{{ item.name }}</span>
      </template>
    </el-autocomplete>
    <el-tag
      :key="tag.id"
      v-for="(tag, index) in dynamicTags"
      closable
      :disable-transitions="false"
      @close="handleClose(index)">
      {{tag.name}}
    </el-tag>
  </el-form-item>

  <el-form-item label="正文">
  <mavon-editor
    :subfield="subfield"
    :codeStyle="code_style"
    :ishljs="true"
    @change="change"
    :externalLink="externalLink"
    v-model="form.markdown"
    style="height: 500px;"/>
  </el-form-item>
  <el-form-item>
    <el-button type="primary" @click="save()">保存</el-button>
    <el-button @click="cancel()">取消</el-button>
  </el-form-item>
</el-form>
  </el-card>
</template>
<script>
  export default {
    data() {
      return {
        form: {
          id:'',
          title: '',
          tag: '',
          sub_title: '',
          category_id: '',
          markdown:'',
          content:'',
        },
        categorys:[],     //分类
        newTag:'',        //新标签
        dynamicTags: [],  //已有标签
        restaurants: [],  //自动补全内容
        //markdown设置
        subfield: true,
        code_style: 'solarized-dark',
        externalLink: {
            markdown_css: function() {
                // 这是你的markdown css文件路径
                return 'static/markdown/github-markdown.min.css';
            },
            hljs_js: function() {
                // 这是你的hljs文件路径
                return 'static/highlightjs/highlight.min.js';
            },
            hljs_css: function(css) {
                // 这是你的代码高亮配色文件路径
                return 'static/highlightjs/styles/' + css + '.min.css';
            },
            hljs_lang: function(lang) {
                // 这是你的代码高亮语言解析路径
                return 'static/highlightjs/languages/' + lang + '.min.js';
            },
            katex_css: function() {
                // 这是你的katex配色方案路径路径
                return 'static/katex/katex.min.css';
            },
            katex_js: function() {
                // 这是你的katex.js路径
                return 'static/katex/katex.min.js';
            }
         }
      }
    },
    methods: {
      save(){
        var tags = [];
        for (var i = this.dynamicTags.length - 1; i >= 0; i--) {
           tags.push(this.dynamicTags[i].id);
         }
        var data = {
              title:this.form.title,
              tag:tags,
              category_id:this.form.category_id,
              content:this.form.content,
              markdown:this.form.markdown
            };
        if(this.form.id){
          this.$axios({
            method:'put',
            url:'/admin/article/' + this.form.id,
            data:data
          })
          .then(response => {
            this.$router.push('/article');
          })
        }else{
          this.$axios({
            method:'post',
            url:'/admin/article',
            data:data
          })
          .then(response => {
            this.$router.push('/article');
          })
        }
      },
      cancel(){
        this.$router.push('/article');
      },
      change(value,render){
        this.form.content = render;
      },
      initInfo(){
        this.$axios({
          method:'get',
          url:'/admin/article/' + this.form.id,
        })
        .then(response => {
          this.form        = response.data.data;
          this.dynamicTags = this.form.tags;
        })
      },
      initCategory(){
        this.$axios({
          method:'get',
          url:'/admin/category',
          params:{
            type:'admin'
          }
        })
        .then(response => {
          this.categorys = response.data.data;
        })
      },
      handleClose(index) {
        this.dynamicTags.splice(index, 1);
      },
      handleInputConfirm() {
        var restaurants = this.restaurants;
        var newTag = this.newTag;
        if(newTag){
          var res = restaurants.filter(this.createFilter(newTag));
          if(res.length == 0){
            this.$axios({
              method:'post',
              url:'/admin/tag',
              data:{
                name:newTag
              }
            })
            .then(response => {
              this.dynamicTags.push({
                id:response.data.data,
                name:newTag
              });
              this.loadAll();
            })
          }else{
            this.tag_ids.push(res);
          }
          this.newTag = '';
        }
      },
      querySearch(queryString, cb) {
        var restaurants = this.restaurants;
        var results = queryString ? restaurants.filter(this.createFilter(queryString)) : restaurants;
        // 调用 callback 返回建议列表的数据
        cb(results);
      },
      createFilter(queryString) {
        return (restaurant) => {
          return (restaurant.name.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
        };
      },
      //加载选择框
      loadAll() {
        this.$axios({
          method:'get',
          url:'/admin/tag'
        })
        .then(response => {
          this.restaurants = response.data.data
        })
      },
      //选择框选择
      handleSelect(item) {
        if(!this.inTags(item)) this.dynamicTags.push(item);
      },
      inTags(item){
        for (var i = this.dynamicTags.length - 1; i >= 0; i--) {
          if(this.dynamicTags[i].name == item.name) return true;
        }
        return false;
      }
    },
    mounted:function(){       //挂载完成时
      if(this.$route.params.id){
        this.form.id = this.$route.params.id;
        this.initInfo();
      }
      this.loadAll();
      this.initCategory();
    }
  }
</script>

<style scoped>
</style>