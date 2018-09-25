<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>文章</span>
    </div>
    <el-button type="primary" icon="el-icon-circle-plus-outline" @click="add()"">新增文章</el-button>
    <el-table
      :data="articles"
      border
      style="width: 100%">
      <el-table-column
        prop="id"
        label="ID"
        width="50">
      </el-table-column>
      <el-table-column
        prop="title"
        label="标题">
      </el-table-column>
      <el-table-column
        prop="category"
        label="分类">
        <template slot-scope="scope">
          <span v-if="scope.row.pcategory">{{scope.row.pcategory}} > {{scope.row.category}}</span>
          <span v-else>{{scope.row.category}}</span>
        </template>
      </el-table-column>
      <el-table-column
        prop="tag_name"
        label="标签">
      </el-table-column>
      <el-table-column
        prop="author"
        label="作者">
      </el-table-column>
      <el-table-column
        prop="sort"
        label="排序">
      </el-table-column>
      <el-table-column
        prop="create_time"
        label="创建时间">
      </el-table-column>
      <el-table-column
        prop="update_time"
        label="修改时间">
      </el-table-column>
      <el-table-column
        label="操作">
        <template slot-scope="scope">
          <el-button type="text" size="small" @click="edit(scope.row)">编辑</el-button>
          <el-button type="text" size="small" @click="remove(scope.row)">删除</el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-pagination style="margin: 20px 0;float: right;"
      @current-change="handleCurrentChange"
      :page-size="limit"
      layout="total, prev, pager, next"
      :total="total">
    </el-pagination>
  </el-card>
</template>
<script>
  export default {
    data() {
      return {
        articles:[],
        dialogVisible: false,
        form:{
          id:'',
          name:'',
        },
        method:'post',
        total:0,
        limit:10,
      }
    },
    methods: {
      info(page = 1){
        this.$axios({
          method:'get',
          url:'/admin/article',
          params:{
            limit:this.limit,
            page:page
          }
        })
        .then(response => {
          this.articles = response.data.data.data;
          this.total    = response.data.data.total;
        })
      },
      edit(info){
        this.$router.push('/article/' + info.id + '/edit');
      },
      add(){
        this.$router.push('/article/create');
      },
      remove(info){
        this.$remove('/admin/article/'+info.id, response => {
          this.info();
        });
      },
      handleCurrentChange(val){
        this.info(val)
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