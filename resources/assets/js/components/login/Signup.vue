<template>
    <el-container>
        <el-form
                :model="form"
                status-icon
                label-width="120px"
                class="demo-ruleForm"
        >
            <el-form-item label="name" prop="name">
                <el-input v-model="form.name" auto-complete="off"></el-input>
                <span class="" v-if="errors.name">{{errors.name[0]}}</span>
            </el-form-item>
            <el-form-item label="Username" prop="email">
                <el-input v-model="form.email" auto-complete="off"></el-input>
                <span class="" v-if="errors.email">{{errors.email[0]}}</span>
            </el-form-item>
            <el-form-item label="Password" prop="password">
                <el-input type="password" v-model="form.password" auto-complete="off"></el-input>
                <span class="" v-if="errors.password">{{errors.password[0]}}</span>
            </el-form-item>
            <el-form-item label="Conform Password" prop="password">
                <el-input type="password" v-model="form.password_confirmation" auto-complete="off"></el-input>
                <span class="" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</span>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(form)">Signup</el-button>
                <router-link to="/login">
                    <el-button type="info">Login</el-button>
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
          name:null,
          email:null,
          password:null,
          password_confirmation:null
        },
        errors:{

        }
      }
    },
    methods:{
      submitForm(form){
        axios.post('/api/auth/signup', form)
          .then(res => {
            User.responseAfterLogin(res)
            this.$router.push({name: 'forum'})
          })
          .catch(error => this.errors = error.response.data.errors)
      }
    }
  }
</script>

<style>

</style>