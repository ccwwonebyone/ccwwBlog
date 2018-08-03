<template>
<div>
  <div style="width: 150px;position: absolute;left: 0px;">
<el-collapse v-model="activeName" accordion>
  <el-collapse-item  v-for="database in databases" :key="database.id"
                      v-bind:name="database.id"
                    >
       <template slot="title">
          <i class="header-icon el-icon-star-on" style="margin-left: 20px;"></i>  {{database.database}}
      </template>
      <el-alert
    title="表一"
    type="success"
    center
    :closable="false">
  </el-alert>
  <el-alert
    title="表二"
    type="info"
    center
    :closable="false">
  </el-alert>
  <el-alert
    title="表三"
    type="info"
    center
    :closable="false">
  </el-alert>
  </el-collapse-item>
</el-collapse>
  </div>
</div>
</template>
<script>
   export default {
    data() {
      return {
        activeName: '1',
        databases:[{
            "id": 1,
            "driver": "mysql",
            "database": "manpro",
            "hostname": "127.0.0.1",
            "username": "root",
            "password": "root",
            "prefix": "",
            "charset": "utf8",
            "hostport": 3306,
            "type": "mysql",
          }]
      };
    },
    methods:{
      getDbs:function(){
        this.$axios({
          method:'get',
          url:'/database'
        })
        .then(response => {
          this.databases = response.data.data;
        })
      }
    },
    created:function () {
      this.getDbs();
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
