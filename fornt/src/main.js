// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import ElementUI from 'element-ui'

import 'element-ui/lib/theme-chalk/index.css'
import hljs from 'highlight.js'
import 'highlight.js/styles/googlecode.css' // 样式文件
//markdown编辑器
import mavonEditor from 'mavon-editor'
import 'mavon-editor/dist/css/index.css'

Vue.config.productionTip = false
Vue.prototype.$axios = axios
Vue.use(ElementUI)
Vue.use(mavonEditor)

Vue.prototype.$axios.interceptors.response.use(
    response => {
        //请求出错
        if(response.status != 200){
            ElementUI.Message({
                message: '服务异常',
                type: 'error'
            });
            return false;
        }else{
            //服务端回应错误
            if(response.data.code != '200'){
                ElementUI.Message({
                    message: response.data.message,
                    type: 'error'
                });
            }else{
                //非get请求，结果提示
                if(response.config.method.toLowerCase() != 'get'){
                    ElementUI.Message({
                        message: response.data.message,
                        type: 'success'
                    });
                }
            }
            return response;
        }
    }
)

Vue.prototype.$remove = function(url,callback){
    ElementUI.MessageBox.confirm('此操作将会彻底删除记录，是否继续？', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
    })
    .then(() => {
        Vue.prototype.$axios({
            method:'delete',
            url:url
        })
        .then(response => {
            callback(response);
        })
    })
    .catch(() => {
      ElementUI.Message({
        type: 'info',
        message: '已取消删除'
      });
    });
}

/* eslint-disable no-new */
new Vue({
  //全局变量
  data:{
    web_company:{
        name:'',
        brand:'',
        copyright:'',
        power:''
    }
  },
  el: '#app',
  router,
  components: { App },
  template: '<App/>',
  //观察者
  watch:{
    web_company:{
        handler(newInfo, oldInfo){
            document.title = newInfo.name;
        },
        deep:true
    }
  }
})

Vue.directive('highlight', function (el) {
  let blocks = el.querySelectorAll('pre code')
  blocks.forEach((block) => {
    hljs.highlightBlock(block)
  })
})
