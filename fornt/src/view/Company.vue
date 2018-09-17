<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>公司</span>
    </div>
    <el-form ref="form" :model="form" label-width="80px">
      <el-form-item label="网站名称" style="width: 240px;">
        <el-input v-model="form.name"></el-input>
      </el-form-item>
      <el-form-item label="网站图片" style="width: 240px;">

        <el-upload
          class="upload-company"
          action="/admin/file"
          list-type="picture">
          <el-button size="small" type="primary">点击上传</el-button>
        </el-upload>
      </el-form-item>
    </el-form>
  </el-card>
</template>
<script>
  export default {
    data() {
      return {
        form: {
          name: '',
          region: '',
          date1: '',
          date2: '',
          delivery: false,
          type: [],
          resource: '',
          desc: ''
        },
        imageUrl: ''
      }
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      },
      handleAvatarSuccess(res, file) {
        this.imageUrl = URL.createObjectURL(file.raw);
      },
      beforeAvatarUpload(file) {
        const isJPG = file.type === 'image/jpeg';
        const isLt2M = file.size / 1024 / 1024 < 2;

        if (!isJPG) {
          this.$message.error('上传头像图片只能是 JPG 格式!');
        }
        if (!isLt2M) {
          this.$message.error('上传头像图片大小不能超过 2MB!');
        }
        return isJPG && isLt2M;
      }
    }
  }
</script>

<style scoped>
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 5px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 30px;
    color: #8c939d;
    width: 45px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    padding-top:10px;
  }
  .avatar {
    width: 30px;
    height: 30px;
    display: block;
  }
</style>