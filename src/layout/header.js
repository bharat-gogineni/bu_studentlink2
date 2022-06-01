import PropTypes from 'prop-types';
import { FaBars } from 'react-icons/fa';



export const Header = ({handleToggleSidebar}) => {
  return (
    <>
        <header>
          <h1>
    <div className="btn-toggle" onClick={() => handleToggleSidebar(true)}>
      <FaBars />
    </div>
          </h1>
        </header>
    </>
  );
};