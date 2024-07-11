import React, { useEffect, useState } from "react";
import Carousel from "react-bootstrap/Carousel";

function HomeBanners() {
 
  return (
    <Carousel>
     
        
        <Carousel.Item >
          <img
            className="d-block w-100"
            src={'/banner.jpg'}
            style={{ height: "500px" }}
            alt="First slide"
          />
          
        </Carousel.Item>
      
    </Carousel>
  );
}

export default HomeBanners;
