<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>标签</span>
    </div>
    <el-button type="primary" icon="el-icon-circle-plus-outline" @click="add()"">新增标签</el-button>
    <el-table
      :data="category"
      border
      style="width: 100%">
      <el-table-column
        prop="id"
        label="ID"
        width="50">
      </el-table-column>
      <el-table-column
        prop="name"
        label="分类">
      </el-table-column>
      <el-table-column
        label="操作">
        <template slot-scope="scope">
          <el-button type="text" size="small" @click="edit(scope.row)">编辑</el-button>
          <el-button type="text" size="small" @click="remove(scope.row)">删除</el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-dialog
      title="分类"
      :visible.sync="dialogVisible"
      width="30%">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="名称">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="makeSure()">确 定</el-button>
      </span>
    </el-dialog>
  </el-card>
</template>
<script>
  export default {
    data() {
      return {
        category:[],
        dialogVisible: false,
        form:{
          id:'',
          name:'',
        },
        method:'post'
      }
    },
    methods: {
      info(){
        this.$axios({
          method:'get',
          url:'/admin/tag',
          params:{
            type:'admin'
          }
        })
        .then(response => {
          this.category = response.data.data;
        })
      },
      edit(info){
        this.dialogVisible = true;
        this.form = info;
        this.method = 'put';
      },
      add(){
        this.dialogVisible = true;
        this.form = {
          name:'',
        }
        this.method = 'post';
      },
      remove(info){
        this.$axios({
            method:'delete',
            url:'/admin/tag/'+info.id
          })
          .then(response => {
            this.info();
          })
      },
      makeSure(){
        if(this.method == 'post'){
          this.$axios({
            method:this.method,
            url:'/admin/tag/',
            data:{
              name:this.form.name
            }
          })
          .then(response => {
            this.dialogVisible = false;
            this.info();
          })
        }else{
          this.$axios({
            method:this.method,
            url:'/admin/tag/'+this.form.id,
            data:{
              name:this.form.name
            }
          })
          .then(response => {
            this.dialogVisible = false;
            this.info();
          })
        }
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