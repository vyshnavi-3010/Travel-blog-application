import React from 'react';
import './App.css';
import HeaderContainerFluid from './Components/Header';
import NavHeader from './Components/Nav';
import HomeBanners from './Components/HomeBanners';
import FooterBotttom from './Components/FooterBotttom';
import MyProjects from './Components/Projects';



function App() {
  return (
    <div className="header">
      <HeaderContainerFluid></HeaderContainerFluid>
      <NavHeader></NavHeader>
      <HomeBanners></HomeBanners>
      <MyProjects></MyProjects>
      <FooterBotttom></FooterBotttom>
</div>
  )
}

export default App;
