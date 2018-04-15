<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" >
        <el-menu-item
            v-for="item in items"
            :index= 'item.title'
            :key="item.title"
        >
            <router-link :to="item.to" v-if="item.show">{{item.title}}</router-link>
        </el-menu-item>

    </el-menu>
</template>
<script>
    export default{
      data(){
        return {
          activeIndex:"1",
          items:[
            {'title':'Forum', to:'/forum', show:true},
            {'title':'Ask Question', to:'/question', show:User.loggedIn()},
            {'title':'category', to:'/categories', show:User.loggedIn()},
            {'title':'Login', to:'/login', show:!User.loggedIn()},
            {'title':'Logout', to:'/logout', show:User.loggedIn()},

          ]
        }
      },

      created(){
        EventBus.$on('logout', ()=> User.logout())
      }
    }
</script>
<style>
    .el-menu-demo li a{text-decoration:none;}
</style>
