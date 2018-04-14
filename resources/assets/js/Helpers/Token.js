class Token{
  //payload로 서버에서 내려온게 맞는지 확인하는 부분
  isValid(token){
    const payload = this.payload(token);

    if(payload){
      return payload.iss == "http://localhost:8000/api/auth/login" ? true : false
    }

    return false
  }

  payload(token){
    const payload = token.split('.')[1]
    return this.decode(payload)
  }

  decode(payload){
    return JSON.parse(atob(payload))
  }
}

export default Token = new Token();