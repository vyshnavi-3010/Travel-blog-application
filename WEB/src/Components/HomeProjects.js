
import React,{ useState, useEffect } from "react";
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Container from 'react-bootstrap/Container';
import Card from 'react-bootstrap/Card';
import './HomeProjects.css';
import { Link, useNavigate } from "react-router-dom";


function HomeProjects() {
  const navigate = useNavigate();
 const [project, setproject] = useState([]);
    useEffect(() => {
    const fetchData = async () => {
      const response = await fetch("https://dev.VyshnaviTravels.com/api/projects", {
        method: "POST"
       
      });
      const responseData = await response.json();
      setproject(responseData.data);

    };

    fetchData();
  }, []);

console.log(project);

function handleClick(e) {
  navigate('/Project_View',{
    state:{
      pdid:e.target.id,
      pdname:e.target.name,
    }
  });


 


}




  return (
    

<div>
<Container>
      
<div class="section-head col-sm-12">
<h4><span>Our</span> Projects</h4>
<p>We're proud of what we've achieved and look forward to continuing to deliver outstanding results for our clients and partners.</p> </div>

        <Row>
        {project.slice(0, 4).map((item) => (

        <Col  md={3} >
          <div key={item.id} className='boxshadow'>
          <img className='imgcard' src={item.image} alt={item.id} thumbnail/>
          <Card.Body>
            <Row style={{paddingTop : "20px"}}className="d-flex align-items-center justify-content-center">
              <Col >
                <h5 className="cardTitle" onClick={handleClick} id={item.id} name={item.name}>{item.name}</h5>
              </Col>
           </Row>

          </Card.Body>
          
          </div>
        </Col>
        ))}
        </Row>

  
    </Container>

    
<p class="space"></p>
<Container>
  
<div class="text-center btn-box">
                            <Link to="/Projects" class="theme-btn btn-style-one">View More</Link>
                        </div>
  </Container>
  <p class="space"></p>



</div>


    
  )
}

export default HomeProjects;
