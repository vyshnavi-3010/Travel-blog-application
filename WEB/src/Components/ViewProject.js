import React, { useEffect , useState } from 'react';
import { useLocation } from 'react-router-dom';
// import { Navigate } from 'react-router-dom';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Container from 'react-bootstrap/Container';
import './ViewProject.css';





function ViewProject({state}) {
const [pro , setProjects] = useState([]);
const location = useLocation();
const [blog , setBlog] = useState(null);
console.log(blog)



// const mdata = {

//     'pjid' : location.projectDetails.pid,
//     'pjname' :location.projectDetails.pname,
// }


const ProjectData = {

'pid' : location.state.pdid,
'cid' : location.state.ctid,
'pname' : location.state.pdname,
// 'pimage' : location.state.pdimage,
// 'pbanner' : location.state.pdbanner,
// 'pgallery' : location.state.pdgallery,
// 'pdescription' : location.state.pdtext,

}


// console.log('name of the project id', ProjectData.pid);
// console.log('name of the project name', ProjectData.pname);

// console.log('name of the cat id', ProjectData.cid);

useEffect(()=>{
  setBlog(location.state);
  console.log(location.state);
const projectsViewDetails = async () =>{
    const projectDetailsapi = await fetch("https://vyshnavitravels.nrrectrust.org/admin/public/api/getBlogs" ,
    { method: 'GET' ,  
    headers: {
        "Content-Type": "application/json"
        
      }
    
    });

const pdataapi = await projectDetailsapi.json();


setProjects(pdataapi?.data?.data);

}
// projectsViewDetails();

},[]);



console.log(pro); 


  return (
    
    <div>
        {/* <div className='title'>{ProjectData.pname}</div> */}

        



<div>


<Container>

<Row className="projectSpace">
  <Col sm={6} >

  <img
          className="d-block w-100"
          src={blog?.banner_url}
          alt="First slide" style={{height:"450px"}}
        />
        </Col>
        <Col sm={12}>
        <br></br>
<h4>{blog?.title}</h4>
<p>Author:{blog?.author}</p>
<br></br>
<p>  <div dangerouslySetInnerHTML={
                { __html: blog?.short_description }
             } /></p>
<br></br>
<p>  <div dangerouslySetInnerHTML={
                { __html: blog?.description }
             } /></p>



<br></br>

{/* <p>{parse(blog.description)}</p> */}
  </Col>
  <Col sm={6}>
    <div>
    {/* <img style={{objectFit:"contain", width: "100%", height:"100%", borderRadius:"10px"}} src={blog.image}></img> */}

    </div>
  </Col>
</Row>

</Container>
<Container>
  {/* <Row className="projectSpace ">
    <div class="text-center">    <h4>Gallery</h4>
</div>
<Gallery></Gallery>
  </Row> */}
</Container>
{/* <p>{ __html: projectDeatils.description,}</p> */}


</div>





   </div>
  )
}

export default ViewProject;