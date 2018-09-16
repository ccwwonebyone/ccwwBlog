<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>分类</span>
    </div>
    <el-button type="primary" icon="el-icon-circle-plus-outline" @click="add()"">新增分类</el-button>
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
        <template slot-scope="scope">
            <span v-if="scope.row.pid != 0" style="padding-left: 30px">
              {{scope.row.name}}
            </span>
            <span v-else>
              {{scope.row.name}}
            </span>
          </template>
      </el-table-column>
      <el-table-column
        prop="sort"
        label="排序">
      </el-table-column>
      <el-table-column
        prop="status"
        label="状态">
        <template slot-scope="scope">
          <el-tag
          :type="scope.row.status == '1' ? 'primary' : 'danger'">
            {{scope.row.status == '1' ? '显示' : '隐藏'}}
          </el-tag>
          </template>
      </el-table-column>
      <el-table-column
        label="操作">
        <template slot-scope="scope">
          <el-button type="text" size="small" @click="edit(scope.row)">编辑</el-button>
          <el-button type="text" size="small" @click="remove(scope.row)">删除</el-button>
          <el-button
           v-if="scope.row.pid == 0"
           type="text"
           size="small"
           @click="addSub(scope.row)">
            新增子分类
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-dialog
      title="分类"
      :visible.sync="dialogVisible"
      width="30%">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="分类">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="排序">
          <el-input v-model="form.sort"></el-input>
        </el-form-item>
        <el-form-item label="上级" v-if="form.pid != 0">
          <el-input v-model="form.pname" readonly></el-input>
        </el-form-item>
        <el-form-item label="状态">
          <el-select v-model="form.status" placeholder="请选择状态">
            <el-option label="显示" value="1"></el-option>
            <el-option label="隐藏" value="0"></el-option>
          </el-select>
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
          sort:'',
          pid:0,
          pname:'',
          status:'',
        },
        method:'post'
      }
    },
    methods: {
      categoryInfo(){
        this.$axios({
          method:'get',
          url:'/admin/category',
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
        this.form.status = this.form.status.toString();
        this.method = 'put';
      },
      addSub(info){
        this.dialogVisible = true;
        this.form = {
          name:'',
          sort:'',
          pid:info.id,
          pname:info.name,
          status:'1',
        };
        this.method = 'post';
      },
      add(){
        this.dialogVisible = true;
        this.form = {
          name:'',
          sort:'',
          pid:0,
          pname:'',
          status:'1',
        }
        this.method = 'post';
      },
      remove(info){
        this.$axios({
            method:'delete',
            url:'/admin/category/'+info.id
          })
          .then(response => {
            this.categoryInfo();
          })
      },
      makeSure(){
        if(this.method == 'post'){
          this.$axios({
            method:this.method,
            url:'/admin/category/',
            data:{
              name:this.form.name,
              sort:this.form.sort,
              pid:this.form.pid,
              status:this.form.status
            }
          })
          .then(response => {
            this.dialogVisible = false;
            this.categoryInfo();
          })
        }else{
          this.$axios({
            method:this.method,
            url:'/admin/category/'+this.form.id,
            data:{
              name:this.form.name,
              sort:this.form.sort,
              pid:this.form.pid,
              status:this.form.status
            }
          })
          .then(response => {
            this.dialogVisible = false;
            this.categoryInfo();
          })
        }
      }
    },
    mounted:function(){
      this.categoryInfo();
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