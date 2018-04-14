import Token from './Token'
import Auth from './Auth'

class User {
  login(formName){
    axios.post('/api/auth/login', formName)
      .then(res => this.responseAfterLogin(res))
      .catch(error=>console.log(error.reponse.data))
  }

  responseAfterLogin(res){

    const access_token = res.data.access_token
    const user = res.data.user;

    if(Token.isValid(access_token)){
      Auth.store(user, access_token)
    }
  }


  hasToken(){
    const storedToken = Auth.getToken();

    if(storedToken){
      return Token.isValid(storedToken) ? true : false
    }
  }

  loggedIn(){
    return this.hasToken()
  }

  logout(){
    Auth.clear();
  }

  name(){
    if(this.loggedIn()){
      return Auth.getUser()
    }
  }

  id(){
    if(this.loggedIn()){
      const payload = Token.payload(Auth.getToken())
      return payload.sub
    }
  }
}

export default User = new User();