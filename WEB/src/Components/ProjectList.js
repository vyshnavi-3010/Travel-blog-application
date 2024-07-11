import React,{useEffect , useState} from 'react';
import { useLocation, useNavigate } from 'react-router-dom';
import './ProjectList.css';
import Table from 'react-bootstrap/Table';
import Container from 'react-bootstrap/Container';
import parse from 'html-react-parser';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card';
import { Button } from "react-bootstrap";
import moment from 'moment';


// import { Navigate } from 'react-router-dom';


function ProjectList({state}) {
   
    const [projects , setProjects] = useState([]);

    const navigate = useNavigate();

const location = useLocation();



const data = {
    'mail': location.state.email,
    'fname':location.state.pname,
    
}


function handleClick(projectsView){



navigate('/Project_View',{


  state: projectsView
});


  }





    useEffect (()=>{

       projectslist(); 

    },[]);


const projectslist = async () =>{
const proje = await fetch("https://vyshnavitravels.nrrectrust.org/admin/public/api/getBlogs?category="+location.state?.slug ,
{ method: 'GET' , 
headers: {
    "Content-Type": "application/json"
    
  }

});


const projectsapi = await proje.json();
setProjects(projectsapi?.data?.data);



}





return(

    


<div>
<div className='title'>{data.fname}</div>
<Container className='spacecontent'>
     <Row className='spacecontt'>
        { projects?.map((projectsView)=>(
<Col md={4}>
          <div key={projectsView.id} className=' boxshadow '>
            {/* <img class="imgcard"  style={{width:'auto', height:'auto'}} rounded></img> */}
            <Card.Img variant="top" src={projectsView.banner_url}  alt={projectsView.name} />
            <Card.Body>

            <Row className="d-flex align-items-center justify-content-center">
            <h5 className="cardTitle" onClick={() => handleClick(projectsView)} id={projectsView.id}
               name={projectsView.name}>{projectsView.title}</h5>

              <p>Author: {projectsView.author}</p>
              <p>posted:{moment(projectsView.created_at).format("DD-MM-yyyy")}</p>
              <Col  >
              <div style={{textAlign:"end"}}>
              {/* <button onClick={handleClick} id={projectsView.id}
             catid={data.mail}  name={projectsView.name}
            >View More</button> */}
             {/* <Button variant="primary" 
            >View More</Button> */}
            </div>
            </Col>

            </Row>
            
               
             </Card.Body>
          </div>
          </Col>
          ))

        }
        </Row>
       
      </Container>
</div>


);


     
    }
 


export default ProjectList;

