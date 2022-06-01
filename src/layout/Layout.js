import React, { useState } from 'react';
import Aside from './Aside';
import Content from './content'
import routes from '../routes'
import { Header } from './header';
import Footer from './footer'

function Layout({ setLocale }) {
  const [rtl, setRtl] = useState(false);
  const [collapsed, setCollapsed] = useState(false);
  const [image, setImage] = useState(true);
  const [toggled, setToggled] = useState(false);

  const handleCollapsedChange = (value) => {
    setCollapsed(value);
  };

  const handleRtlChange = (checked) => {
    setRtl(checked);
    setLocale(checked ? 'ar' : 'en');
  };
  const handleImageChange = (checked) => {
    setImage(checked);
  };

  const handleToggleSidebar = (value) => {
    setToggled(value);
  };

  console.log(routes)
  return (
    <div className={`app ${rtl ? 'rtl' : ''} ${toggled ? 'toggled' : ''}`}>
      <Aside
        image={image}
        collapsed={collapsed}
        rtl={rtl}
        toggled={toggled}
        handleToggleSidebar={handleToggleSidebar}
      />
      <div id="container">
        <Header id="header" handleToggleSidebar={handleToggleSidebar}></Header>
        <Content id="body" />
        <Footer id="footer" />
      </div>
    </div>
  );
}

export default Layout;
