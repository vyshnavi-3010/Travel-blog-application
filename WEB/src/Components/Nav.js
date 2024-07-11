import React from 'react';
// import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
//   import { faUserPlus } from '@fortawesome/free-solid-svg-icons'
import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';
import logo from '../images/logo.png';
import './Nav.css';
// import Button from 'react-bootstrap/Button';
import { NavLink } from "react-router-dom";
import Example from "../Components/Models/Login.js";
import { useLocation } from "react-router-dom";







function NavHeader() {


 
  
    return (
      <Navbar className = 'Navshadow' collapseOnSelect expand="lg" bg="white" variant="white">
        <Container>
          <Navbar.Brand href="/"><img className='logoImage'src={logo} rounded  alt = "VyshnaviTravels"  /></Navbar.Brand>
          <Navbar.Toggle aria-controls="responsive-navbar-nav" />
          <Navbar.Collapse id="responsive-navbar-nav">
            <Nav className="me-auto ">
              {/* <Nav.Link><NavLink  to ="/">Home</NavLink></Nav.Link> */}
              {/* <Nav.Link> <NavLink   to="/About">About Us</NavLink></Nav.Link> */}
              <Nav.Link><NavLink to="/">Home</NavLink></Nav.Link>

              <Nav.Link><NavLink to="/projects">Blog</NavLink></Nav.Link>

              {/* <Nav.Link><NavLink to="/ecommerce">E-commerce App</NavLink></Nav.Link> */}
              {/* <Nav.Link> <NavLink to="/ContactUs">Contact Us</NavLink></Nav.Link> */}


            </Nav>
            <Nav>
              <Nav.Link > 
</Nav.Link>
              {/* <Nav.Link eventKey={2} href="#memes">
                Dank memes
              </Nav.Link> */}
            </Nav>
          </Navbar.Collapse>
        </Container>
      </Navbar>
    );
  }
  
  export default NavHeader;