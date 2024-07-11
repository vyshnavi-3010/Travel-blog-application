import React from 'react';
import ProjectList from '../Components/ProjectList';
import HeaderContainerFluid from '../Components/Header';
import NavHeader from '../Components/Nav';
import FooterBotttom from "../Components/FooterBotttom";

function ProjectsCtegoriList() {
  return (
    <div>
      <HeaderContainerFluid></HeaderContainerFluid>
      <NavHeader></NavHeader>
    <ProjectList></ProjectList>
    {/* <Footer></Footer> */}
    <FooterBotttom></FooterBotttom>
    </div>
  )
}

export default ProjectsCtegoriList;