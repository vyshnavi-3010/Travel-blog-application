import React from 'react';
import ViewProject from '../Components/ViewProject';
import HeaderContainerFluid from '../Components/Header';
import NavHeader from '../Components/Nav';
import FooterBotttom from '../Components/FooterBotttom';
function ProjectView() {
  return (
    <div>
        <HeaderContainerFluid></HeaderContainerFluid>
        <NavHeader></NavHeader>
        <ViewProject></ViewProject>
        <FooterBotttom></FooterBotttom>
        
        </div>
  )
}

export default ProjectView