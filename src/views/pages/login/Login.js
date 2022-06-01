import React, { useState } from 'react';
import PropTypes from 'prop-types';
import './Login.css';

async function loginUser(credentials) {
  return fetch('http://localhost/studentlink2/public/auth', {
  method: 'POST',
  body: credentials
})
.then(data => data.json())
}

export default function Login({ setToken }) {
  const [username, setUserName] = useState();
  const [password, setPassword] = useState();
  
  const handleSubmit = async e => {
    e.preventDefault();
    let formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    const token = await loginUser(formData);
    setToken(token);
    window.location.reload()
  }
  
  return(
    <div className="App">
    <div className="appAside" />
    <div className="appForm">
    <div className="formTitle">
    <div className="formCenter">
    <form className="formFields" onSubmit={handleSubmit}>
    <label>
    <p>Username</p>
    <input type="text" className="formFieldInput" placeholder="Enter your Username" onChange={e => setUserName(e.target.value)} />
    </label>
    <label>
    <p>Password</p>
    <input type="password" className="formFieldInput" placeholder="Enter your password" onChange={e => setPassword(e.target.value)} />
    </label>
    <div>
    <div className="formField">
    <button type="submit" className="formFieldButton">Sign In</button>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    )
  }
  
  Login.propTypes = {
    setToken: PropTypes.func.isRequired
  };