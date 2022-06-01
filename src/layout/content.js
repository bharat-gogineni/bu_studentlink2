import React, { Suspense } from 'react'
import { Navigate, Route, Routes,Outlet } from 'react-router-dom'
import CssBaseline from '@mui/material/CssBaseline';
import Container from '@mui/material/Container';
import Box from '@mui/material/Box';

// routes config
import routes from '../routes'
import { FaBars } from 'react-icons/fa';

const Content = ({handleToggleSidebar}) => {
  return (
    <main>
  <Box
    sx={{
      display: 'flex',
      flexDirection: 'column',
      minHeight: '100vh',
      width: '100%',
    }}
  >
    <CssBaseline />
        <Routes>
          {routes.map((route, idx) => {
            return (
              route.element && (
                <Route
                  key={idx}
                  path={route.path}
                  name={route.name}
                  element={<route.element />}
                />
              )
            )
          })}
          <Route path="/" element={<Navigate replace to="/home" />} />
        </Routes>
      <Outlet />
      </Box></main>
  )
}

export default Content
