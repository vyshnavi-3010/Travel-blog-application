
import React,{ useState, useEffect } from "react";
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Container from 'react-bootstrap/Container';
import Card from 'react-bootstrap/Card';
import './Projects.css';
import { useNavigate } from "react-router-dom";
import { Button } from "react-bootstrap";






function MyProjects() {
  const navigate = useNavigate();

  const [project, setproject] = useState([]);


  

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch("https://vyshnavitravels.nrrectrust.org/admin/public/api/getCategories", {
        method: "GET"
       
      });
      const responseData = await response.json();
      setproject(responseData?.data?.data);

    };

    fetchData();
  }, []);

console.log(project);

function handleClick(item) {
  navigate('/project_category_list',{
    state: item
  });


}




  return (
    

<div>
<Container className="spacebar">
      

        <Row >
        {project.map((item) => (

        <Col md={4} >
          <div key={item.id} className=' boxshadow '>
          <img className='imgcard' src={item.image_url} alt={item.id} thumbnail/>
          <Card.Body>
            <Row className="d-flex align-items-center justify-content-center">
              <Col >
                <h5 onClick={()=>handleClick(item)} id={item.id} name={item.name} className="cardTitle">{item.name}</h5>
                
              </Col>
              {/* <Col>               <div style={{textAlign:"end"}}>
<Button variant="primary" type="button" onClick={handleClick} id={item.id} name={item.name}> View More</Button></div>
</Col> */}

            </Row>

          </Card.Body>
          
          </div>
        </Col>
        ))}
        </Row>
        
      
      
    </Container>

</div>

    
  );
}

export default MyProjects;
