<template>
<el-form ref="form" :model="form" label-width="80px">
  <el-form-item label="组件名称" >
    <el-input v-model="form.name" style="width:360px;"></el-input>
  </el-form-item>
  <el-form-item label="类型">
      <el-select v-model="form.type" placeholder="请选择组件类型" style="width:360px;">
          <el-option label="导航" value="1"></el-option>
          <el-option label="正文" value="2"></el-option>
          <el-option label="页脚" value="3"></el-option>
      </el-select>
  </el-form-item>
  <el-form-item label="压缩文件">
    <el-upload style="width:360px;"
    class="avatar-uploader"
    drag
    :on-success="setFilename"
    action="/admin/file">
    <i class="el-icon-upload"></i>
  <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
  <div class="el-upload__tip" slot="tip">只能上传压缩文件，且不超过20M</div>
    </el-upload>
  </el-form-item>
  <el-form-item>
    <el-button type="primary" @click="onSubmit">立即创建</el-button>
  </el-form-item>
</el-form>
</template>
<script>
  export default {
    data() {
      return {
        form: {
          name: '',
          type: '',
          filename:''
        }
      }
    },
    methods: {
      onSubmit() {
        this.$axios({
          method:'post',
          url:'/admin/component',
          data:this.form
        })
        .then(response => {
          
        })
      },
      setFilename(response,file,file_list){
        this.form.filename = response.data;
      }
    }
  }
</script>

<style scoped>

</style>