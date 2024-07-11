import React, { useEffect } from 'react';
import { useState } from 'react';
import  './Login.css';
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faUserPlus } from '@fortawesome/free-solid-svg-icons';
import Form from 'react-bootstrap/Form';
import { useNavigate } from "react-router-dom";


function Example() {
  const [show, setShow] = useState(false);
  const [email, setEmail] = useState("");
  const navigate = useNavigate();

  // const [accessToken, setAccessToken] = useState(getAccessToken());

useEffect(()=>{
console.log(JSON.parse(localStorage.getItem('user')));
},[])


  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);


//  submitForm = (e) =>{
//   e.preventDefault();


// } ;




async function submit(){

  navigate('/otp_verify');
   
    




  console.log(email);

  const emaillogin=(email);
  const result = await fetch ("https://dev.VyshnaviTravels.com/api/login",
 {method:"POST",
headers:{
  "Content-Type": "application/json",
  "Accept": "application/json"
},
body:JSON.stringify(emaillogin)
});


const responseData = await result.json();

// console.log('suresh',responseData.data.user.data);

localStorage.setItem('user',JSON.stringify(responseData.data));

// const apiToken = responseData.data.token;


// localStorage.setItem("token",apiToken);


}





  return (
    <>
     
      <Button variant="dark"  onClick={handleShow} > <FontAwesomeIcon  icon={faUserPlus} /> Login</Button>{' '}

      <Modal show={show} onHide={handleClose} animation={false} size="md"
      aria-labelledby="contained-modal-title-vcenter"
      centered>
        <Modal.Header closeButton>
          <Modal.Title>Login With Mobile Number</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          
        <Form>
          <br></br>
      <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
        {/* <Form.Label>Registered Mobile Number</Form.Label> */}
        <Form.Control 
        type="email"
        name="email"
        placeholder="Registered E-mail Address"
        onChange={(e)=> setEmail(e.target.value)}
         />
        <br></br>
      </Form.Group>
      <Button class="theme-btn btn-style-one" Type= "submit" onClick={submit}  >
            Log In
          </Button>
      </Form>
        </Modal.Body>
        <Modal.Footer>
          {/* <Button variant="secondary" onClick={handleClose}>
            Close
          </Button> */}
          
         
        </Modal.Footer>
        
      </Modal>
    </>
  );
}

export default Example;