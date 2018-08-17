<template>
<el-form ref="form" :model="form" label-width="80px">
  <el-form-item label="页面名称" >
    <el-input v-model="form.name" style="width:360px;"></el-input>
  </el-form-item>
    <el-form-item label="启用组件" >
    <el-input v-model="form.component_ids" style="width:360px;"></el-input>
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
          component_ids: ''
        }
      }
    },
    methods: {
      onSubmit() {
        this.$axios({
          method:'post',
          url:'/admin/page',
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

<style>

</style>