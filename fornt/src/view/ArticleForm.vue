<template>
<div>
<el-form ref="form" :model="form" label-width="80px">
  <el-form-item label="标题">
    <el-input v-model="form.title"></el-input>
  </el-form-item>
  <el-form-item label="标签">
    <el-input v-model="form.tag"></el-input>
  </el-form-item>
  <el-form-item label="所属分类">
    <el-input v-model="form.category_id"></el-input>
  </el-form-item>
  <el-form-item label="正文">
  <mavon-editor
    :subfield="subfield"
    :codeStyle="code_style"
    :ishljs="true"
    @change="change"
    :externalLink="externalLink"
    v-model="editorText"/>
  </el-form-item>
  <el-form-item label="所属分类">
  </el-form-item>
</el-form>
  <button @click="save">保存</button>
</div>

</template>
<script>
  export default {
    data() {
      return {
        form: {
          title: '',
          tag: '',
          sub_title: '',
          category_id: ''
        },
        imageUrl: '',
        editorText:'# asdas',
        editorHtml:'',
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
            },
         }
      }
    },
    methods: {
      save(){
        this.$axios({
          method:'post',
          url:'/admin/article',
          data:{
            markdown:this.editorText,
            content:this.editorHtml,
            title:this.form.title,
            sub_title:this.form.sub_title,
            category_id:this.form.category_id,
            tag:this.form.tag
          }
        })
        .then(response => {
          this.apis = response.data.data.data
        })
      },
      change(value,render){
        this.editorHtml = render;
      }
    },
    mounted:function(){       //挂载完成时
      console.log(this.$route.params);
    }
  }
</script>

<style scoped>
</style>