import React from 'react';
import { useIntl } from 'react-intl';
import {
  ProSidebar,
  Menu,
  MenuItem,
  SubMenu,
  SidebarHeader,
  SidebarFooter,
  SidebarContent,
} from 'react-pro-sidebar';
import { FaGithub, FaQuestion } from 'react-icons/fa';
import { Link } from 'react-router-dom';
import sidebarBg from '../assets/bg2.jpg';
import logo from '../assets/site.png'
import _nav from '../_nav'

const Aside = ({ image, collapsed, toggled, handleToggleSidebar }) => {
  const renderSubMenu = (items,title,icon) => {
    return <SubMenu
        icon={icon? icon : <FaQuestion />}
        title = {title}
        key={title}
      >
        {items.map(i => {
          return <>
          { i.items? renderSubMenu(i.items,i.title,i.icon) : <MenuItem
          key={i.itemId}
          icon={i.icon? i.icon : <FaQuestion />}
          >
            { i.title }
            <Link to={i.itemId} />
            </MenuItem> }</>
      })
        }
      </SubMenu>
  }
  const intl = useIntl();
  return (
    <ProSidebar
      image={image ? sidebarBg : false}
      collapsed={collapsed}
      toggled={toggled}
      breakPoint="md"
      onToggle={handleToggleSidebar}
    >
      <SidebarHeader>
        <div
          style={{
            padding: '24px',
            textTransform: 'uppercase',
            fontWeight: 'bold',
            fontSize: 14,
            letterSpacing: '1px',
            overflow: 'hidden',
            textOverflow: 'ellipsis',
            whiteSpace: 'nowrap',
          }}
        >
        <img src={logo} alt="react logo" />
        </div>
      </SidebarHeader>

      <SidebarContent>
          { _nav.map(i => {
          return <Menu
          iconShape="circle"
          key={i.itemId}
          icon={i.icon? i.icon : <FaQuestion />}
        >
          {i.items? renderSubMenu(i.items,i.title,i.icon) : <MenuItem
          key={i.itemId}
            icon={i.icon? i.icon : <FaQuestion />}
          >
          <Link to={i.itemId} key={i.itemId} />
            { i.title }
            </MenuItem>}
            </Menu>
        })}
      </SidebarContent>

      <SidebarFooter style={{ textAlign: 'center' }}>
        
      </SidebarFooter>
    </ProSidebar>
  );
};

export default Aside;
