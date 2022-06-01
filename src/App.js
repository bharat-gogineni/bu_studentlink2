import React, { Component } from 'react'
import { IntlProvider } from 'react-intl';
import { HashRouter, Route, Routes } from 'react-router-dom'
import Layout from './layout/Layout';
import messages from './messages';
import './styles/App.scss';
import CircularProgress from '@mui/material/CircularProgress';
import useToken from './components/useToken';
const Login = React.lazy(() => import('./views/pages/login/Login'))

function App() {
  const { token, setToken } = useToken();
  if(!token) {
    return (<React.Suspense fallback={<CircularProgress />}><Login setToken={setToken} /></React.Suspense>)
  }
  return (
    <HashRouter>
    <React.Suspense fallback={<CircularProgress />}>
      <Routes>
        <Route path="/*" name="Home" element={<IntlProvider locale='en' messages={messages['en']}><Layout setLocale='en' /></IntlProvider>} />
      </Routes>
    </React.Suspense>
  </HashRouter>
  );
}

export default App
