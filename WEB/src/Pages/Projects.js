import React from 'react';
import HeaderContainerFluid from '../Components/Header';
import NavHeader from '../Components/Nav';
import FooterBotttom from "../Components/FooterBotttom";
import Container from 'react-bootstrap/Container';
// import Row from 'react-bootstrap/Row';
// import Col from 'react-bootstrap/Col';
import './Project.css';
import MyProjects from '../Components/Projects';
function Projects() {
  return (
    <>
    <HeaderContainerFluid></HeaderContainerFluid>
    <NavHeader></NavHeader>
<Container fluid>
    <Container>
<MyProjects></MyProjects>
    </Container>
</Container>
    <FooterBotttom></FooterBotttom>
    </>
  )
}

export default Projects