<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>公司</span>
    </div>
    <el-form ref="form" :model="form" label-width="100px">
      <el-form-item label="网站名称" style="width: 340px;">
        <el-input v-model="form.name"></el-input>
      </el-form-item>
      <el-form-item label="网站图片" style="width: 340px;">
        <img :src="form.brand" style="width: 250px;height: 70px;">
        <el-upload
          class="upload-company"
          action="/admin/file"
          :on-success="brandUpload">
          <el-button size="small" type="primary">点击上传</el-button>
        </el-upload>
      </el-form-item>
      <el-form-item label="浏览器图标" style="width: 340px;">
        <img :src="form.favicon" style="width: 16px;height: 16px;">
        <el-upload
          class="upload-company"
          action="/admin/file"
          :on-success="icoUpload"
          >
          <el-button size="small" type="primary">点击上传</el-button>
        </el-upload>
      </el-form-item>
      <el-form-item label="copyright" style="width: 340px;">
        <el-input v-model="form.copyright"></el-input>
      </el-form-item>
      <el-form-item label="power" style="width: 340px;">
        <el-input v-model="form.power"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="save()">保存</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>
<script>
  export default {
    data() {
      return {
        form: {
          id: '',
          name: '',
          power: '',
          copyright: '',
          brand: '',
          favicon: ''
        }
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
      },
      brandUpload(response, file, fileList){
        this.form.brand = response.data;
        fileList = [file];

      },
      icoUpload(response, file, fileList){
        this.form.favicon = response.data;
        fileList = [file];
      },
      info(){
        this.$axios({
          methods:'get',
          url:'/admin/company'
        })
        .then(response => {
          this.form    = response.data.data;
          this.$root.$data.web_company = response.data.data;
        })
      },
      save(){
        this.$axios({
          method:'put',
          url:'/admin/company/' + this.form.id,
          data:this.form
        })
        .then(response => {
          this.info()
          // console.log(this.$common);
          // this.$common = response.data.data;

        })
      }
    },
    mounted:function(){
      this.info();
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