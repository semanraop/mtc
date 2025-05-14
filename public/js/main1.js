import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";

// import { Orbitcontrol} from 
import { OrbitControls } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js";


import {GLTFLoader} from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js"


const scene = new THREE.Scene();

const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 10000);


let object;

let controls;

// let objToRender = 'arle';
let objToRender = 'floor1';

const loader = new GLTFLoader();

loader.load(
    `models/${objToRender}/scene.gltf`,
    function(gltf){

        object = gltf.scene;
        scene.add(object);
    },
    function(xhr){
        console.log((xhr.loaded / xhr.total *100) + '% loaded');
    },

    function(error){
        console.error(error);
    }
);



const renderer = new THREE.WebGLRenderer({alpha:true});
renderer.setSize(window.innerWidth,window.innerHeight);

document.getElementById("container3D").appendChild(renderer.domElement);


// Set how far the camera will be from the 3D model
camera.position.z = objToRender === "floor1" ? 15 : 300; // Decreased distance for closer view
camera.position.y = 15;
camera.position.x = -15;

// Optionally adjust the object position if needed
// object.position.set(0, 0, 20); // Moves the object closer to the camera

// Add realistic lighting to the scene
// 1. Hemisphere Light for natural ambient effect
const hemisphereLight = new THREE.HemisphereLight(0xaaaaaa, 0x444444, 1); // (sky color, ground color, intensity)
hemisphereLight.position.set(0, 200, 0); // Position it above the scene
scene.add(hemisphereLight);

// 2. Directional Light for a strong key light (like sunlight)
const directionalLight = new THREE.DirectionalLight(0xffffff, 1.2); // (color, intensity)
directionalLight.position.set(50, 200, 100); // Set position to mimic sunlight direction
directionalLight.castShadow = true; // Enable shadows

// Configure shadow properties for better performance and quality
directionalLight.shadow.mapSize.width = 2048;
directionalLight.shadow.mapSize.height = 2048;
directionalLight.shadow.camera.near = 1;
directionalLight.shadow.camera.far = 500;
directionalLight.shadow.camera.left = -50;
directionalLight.shadow.camera.right = 50;
directionalLight.shadow.camera.top = 50;
directionalLight.shadow.camera.bottom = -50;

// Add directional light to the scene
scene.add(directionalLight);

// 3. Lower-intensity Ambient Light for subtle overall illumination
const ambientLight = new THREE.AmbientLight(0x555555, 0.3); // (color, intensity)
scene.add(ambientLight);

// (Optional) Light Helpers to debug light positions
const dirLightHelper = new THREE.DirectionalLightHelper(directionalLight, 10); // Debug directional light
scene.add(dirLightHelper);
const hemiLightHelper = new THREE.HemisphereLightHelper(hemisphereLight, 10); // Debug hemisphere light
scene.add(hemiLightHelper);

// Enable shadows on the renderer
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap; // Smooth shadows

//This adds controls to the camera, so we can rotate / zoom it with the mouse
if (objToRender === "floor1") {
  controls = new OrbitControls(camera, renderer.domElement);
}

//Render the scene
function animate() {
  requestAnimationFrame(animate);
  //Here we could add some code to update the scene, adding some automatic movement

  //Make the eye move
  if (object && objToRender === "eye") {
    //I've played with the constants here until it looked good 
    object.rotation.y = -3 + mouseX / window.innerWidth * 3;
    object.rotation.x = -1.2 + mouseY * 2.5 / window.innerHeight;
  }
  renderer.render(scene, camera);
}

//Add a listener to the window, so we can resize the window and the camera
window.addEventListener("resize", function () {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});

//add mouse position listener, so we can make the eye move
document.onmousemove = (e) => {
  mouseX = e.clientX;
  mouseY = e.clientY;
}

//Start the 3D rendering
animate();