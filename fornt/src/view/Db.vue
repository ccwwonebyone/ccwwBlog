<template>
<div>
  <div style="width: 150px;position: absolute;left: 0px;">
    <el-tree
      :props="props"
      :load="dbTables"
      :render-content="renderContent"
      accordion
      lazy>
    </el-tree>
  </div>
</div>
</template>
<script>
   export default {
    data() {
      return {
        activeName: '1',
        props: {
          isLeaf: 'leaf'
        },
        databases:[{
            "id": 1,
            "driver": "mysql",
            "name":'',
            "database": "manpro",
            "hostname": "127.0.0.1",
            "username": "root",
            "password": "root",
            "prefix": "",
            "charset": "utf8",
            "hostport": 3306,
            "type": "mysql",
          }],
        tables:[{

        }]
      };
    },
    methods:{
      dbTables(node,resolve) {
        if (node.level === 0) {
          this.$axios({
            method:'get',
            url:'/database'
          })
          .then(response => {
            return resolve(response.data.data);
          })
        }
        if (node.level== 1){
          this.$axios({
            method:'get',
            url:'/database/get_table/' + node.data.id
          })
          .then(response => {
            for(let index in response.data.data){
              response.data.data[index].leaf = true;
            }
            return resolve(response.data.data);
          })
        }
      },
      renderContent(h, { node, data, store }) {     //自定义树的内容
        if(data.database){
          return (<span>{data.database}-{data.charset}</span>);
        }else{
          return (<span>{data.name}</span>);
        }
      }
    },
    created:function () {
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
