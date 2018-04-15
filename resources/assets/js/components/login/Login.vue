<template>
    <el-container>
        <el-form
                :model="form"
                status-icon
                label-width="120px"
                class="demo-ruleForm"
                @submit.native.prevent="submitForm"
        >
            <el-form-item label="Username" prop="email">
                <el-input v-model="form.email" auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item label="Password" prop="password">
                <el-input type="password" v-model="form.password" auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(form)">Login</el-button>
                <router-link to="/signup">
                    <el-button type="info">Signup</el-button>
                </router-link>
            </el-form-item>


        </el-form>
    </el-container>
</template>

<script>
export default{
  data(){
    return{
      form:{
        email:null,
        password:null
      }
    }
  },
  created(){
    if(User.loggedIn()){
      this.$router.push({name:'forum'})
    }
  },
  methods:{
    submitForm(form){
      User.login(form)
      this.$router.push({name: 'forum'})
    }
  }
}
</script>

<style>

</style>