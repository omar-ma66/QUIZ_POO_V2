console.log("Hello");

let questionTime = document.querySelector("#question-time");
let questionQuiz = document.querySelector("#question-quiz");
let quizReponse1 = document.querySelector("#quiz-reponse1");
let quizReponse2 = document.querySelector("#quiz-reponse2");
let quizReponse3 = document.querySelector("#quiz-reponse3");
let quizReponse4 = document.querySelector("#quiz-reponse4");
let questionNum = document.querySelector("#question-num");
let boiteReponse1 = document.querySelector("#boiteReponse1");
let boiteReponse2 = document.querySelector("#boiteReponse2");
let boiteReponse3 = document.querySelector("#boiteReponse3");
let boiteReponse4 = document.querySelector("#boiteReponse4");
let progresseBarreElement = document.querySelector("#progresse-barre");
let btnSuivant = document.querySelector("#btn-suivant");
let themeChoisi = document.querySelector("#theme-choisi");
let themeID;
let questionsAllInformations;
let reponsesAll;
let questionsID = [];
let questionsEnonce = [];
let compteur = 0;
let pageSuivente = 0;
let numQuestion = 0;
let gameObjet = {
  questions: 0,
  temps: 0,
};

//################################################################
// cette fonction génére un tableau de nombre alléatoire
function createRandomMatrix(limite) {
  const tableau = [];
  while (tableau.length < limite) {
    let randNumber = Math.floor((Math.random() * 10) % limite);

    if (!tableau.includes(randNumber)) tableau.push(randNumber);
  }
  return [...tableau];
}
//#####################################################################
// initialise et reset le background des 4 reponses en gris

function InitBackColorReponse() {
  if (
    boiteReponse1.classList.contains("bg-green-300") ||
    boiteReponse1.classList.contains("bg-red-300")
  ) {
    boiteReponse1.classList.remove("bg-green-300");
    boiteReponse1.classList.remove("bg-red-300");
    boiteReponse1.classList.add("bg-[#d9d9d9]");
  }
  if (
    boiteReponse2.classList.contains("bg-green-300") ||
    boiteReponse2.classList.contains("bg-red-300")
  ) {
    boiteReponse2.classList.remove("bg-green-300");
    boiteReponse2.classList.remove("bg-red-300");
    boiteReponse2.classList.add("bg-[#d9d9d9]");
  }
  if (
    boiteReponse3.classList.contains("bg-green-300") ||
    boiteReponse3.classList.contains("bg-red-300")
  ) {
    boiteReponse3.classList.remove("bg-green-300");
    boiteReponse3.classList.remove("bg-red-300");
    boiteReponse3.classList.add("bg-[#d9d9d9]");
  }
  if (
    boiteReponse4.classList.contains("bg-green-300") ||
    boiteReponse4.classList.contains("bg-red-300")
  ) {
    boiteReponse4.classList.remove("bg-green-300");
    boiteReponse4.classList.remove("bg-red-300");
    boiteReponse4.classList.add("bg-[#d9d9d9]");
  }
}

let pageSuivante = 0;
//bg-[#d9D9D9] Evenement des 4 boutons reponse
let tour = 0;



boiteReponse1.addEventListener('click',(event)=>{
  if(event.currentTarget === boiteReponse1)
  {
    console.log(event.currentTarget.dataset.reponse);
  //  getQuestionAndReponses({"status":"quiz","id":event.currentTarget.dataset.reponse})
  }
       
})

boiteReponse2.addEventListener('click',(event)=>{
   if(event.currentTarget === boiteReponse2)
       {
        console.log(event.currentTarget.dataset.reponse);
  //  getQuestionAndReponses({"status":"quiz","id":event.currentTarget.dataset.reponse})
       }
})
boiteReponse3.addEventListener('click',(event)=>{
   if(event.currentTarget === boiteReponse3)
       {
        console.log(event.currentTarget.dataset.reponse);
  //  getQuestionAndReponses({"status":"quiz","id":event.currentTarget.dataset.reponse})

       }
})
boiteReponse4.addEventListener('click',(event)=>{
   if(event.currentTarget === boiteReponse4)
   { 
       console.log(event.currentTarget.dataset.reponse);
  //  getQuestionAndReponses({"status":"quiz","id":event.currentTarget.dataset.reponse})
      
      }
})





function initEventBoutonReponse(btn, quiz) {
  if (btn) {
    btn.addEventListener("click", (event) => {
      if (pageSuivante != numQuestion) return;
      pageSuivante++;
      tour++;
      console.log(
        `le tour num ${tour} : ${pageSuivante}: ${numQuestion} ${decompte} question ${gameObjet["questions"]} temps ${gameObjet["temps"]}`,
      );

      if (quiz.dataset.reponse === "1") {
        btn.classList.remove("bg-[#d9d9d9]");
        btn.classList.add("bg-green-300");
        if (decompte !== 0)
        gameObjet["questions"]++; // ajout du nombre de bonne réponses
        gameObjet["temps"] += decompte; // ajout le temps
        localStorage.setItem("gameClassement", JSON.stringify(gameObjet));
        progresseBarre();
      } else {
        btn.classList.remove("bg-[#d9d9d9]");
        btn.classList.add("bg-red-300");
        if (quizReponse1.dataset.reponse === "1") {
          boiteReponse1.classList.remove("bg-[#d9d9d9]");
          boiteReponse1.classList.add("bg-green-300");
        }
        if (quizReponse2.dataset.reponse === "1") {
          boiteReponse2.classList.remove("bg-[#d9d9d9]");
          boiteReponse2.classList.add("bg-green-300");
        }
        if (quizReponse3.dataset.reponse === "1") {
          boiteReponse3.classList.remove("bg-[#d9d9d9]");
          boiteReponse3.classList.add("bg-green-300");
        }
        if (quizReponse4.dataset.reponse === "1") {
          boiteReponse4.classList.remove("bg-[#d9d9d9]");
          boiteReponse4.classList.add("bg-green-300");
        }
      }
      stopTime();
      btnSuivantVisible();
    });
  } else console.log("############################################");
}

// initEventBoutonReponse(boiteReponse1, quizReponse1);
// initEventBoutonReponse(boiteReponse2, quizReponse2);
// initEventBoutonReponse(boiteReponse3, quizReponse3);
// initEventBoutonReponse(boiteReponse4, quizReponse4);

function btnSuivantInvisible() {
  btnSuivant.classList.add("invisible");
}
function btnSuivantVisible() {
  btnSuivant.classList.remove("invisible");
}

//##################################################################
// on gere le bouton Suivant ;
btnSuivant.addEventListener("click", (event) => {
  numQuestion++;
  if (numQuestion < 5) {
    getQuestionAndReponses({status:"question-reponses"});
  } else {
    window.location.href = "./endGame.php";
  }
});

let myTimeOut;
let decompte;
//#############################################
// fonction call back pour la decrementation du compteur
// a la fin du temps de 15 secondes si user na pas fait sont choix
// on active le bouton suivan ;
function decrementeCompteur() {
  questionTime.innerText = decompte + "s";
  if (decompte > 8) {
    if (questionTime.classList.contains("bg-red-300")) {
      questionTime.classList.remove("bg-red-300");
      questionTime.classList.add("bg-green-300");
    } else {
      questionTime.classList.add("bg-green-300");
    }
  } else {
    if (questionTime.classList.contains("bg-green-300")) {
      questionTime.classList.remove("bg-green-300");
      questionTime.classList.add("bg-red-300");
    } else {
      questionTime.classList.add("bg-red-300");
    }
  }

  if (decompte > 0) {
    decompte--;
  } else {
    clearInterval(myTimeOut);
    btnSuivantVisible();
  }
}
//#############################################
// demare le compteur
function runTime(time) {
  stopTime(); // clearInterval(myTimeOut);
  decompte = time;
  myTimeOut = setInterval(decrementeCompteur, 1000);
}

function stopTime() {
  clearInterval(myTimeOut);
}

//#############################################
// progresse barre indique la progression des bonnes reponses
let level = 0;
function progresseBarre() {
  if (progresseBarreElement) {
    switch (parseInt(progresseBarreElement.dataset.level)) {
      case 0:
        progresseBarreElement.classList.remove("invisible");
        progresseBarreElement.dataset.level = 1;
        break;
      case 1:
        progresseBarreElement.classList.remove("w-1/5");
        progresseBarreElement.classList.add("w-2/5");
        progresseBarreElement.dataset.level = 2;
        break;
      case 2:
        progresseBarreElement.classList.remove("w-2/5");
        progresseBarreElement.classList.add("w-3/5");
        progresseBarreElement.dataset.level = 3;
        break;
      case 3:
        progresseBarreElement.classList.remove("w-3/5");
        progresseBarreElement.classList.add("w-4/5");
        progresseBarreElement.dataset.level = 4;
        break;
      case 4:
        progresseBarreElement.classList.remove("w-4/5");
        progresseBarreElement.classList.add("w-5/5");
        progresseBarreElement.dataset.level = 5;
        break;
      case 5:
        break;
    }
    return;
  }
}

//#############################################
// informe le numero de question
function setQuestion(num) {
  questionNum.innerText = "Question " + num + "/5";
}

function InitDataReponses() {
  quizReponse1.dataset.reponse = "0";
  quizReponse2.dataset.reponse = "0";
  quizReponse3.dataset.reponse = "0";
  quizReponse4.dataset.reponse = "0";
}

function InitDataReponsesBoite() {
  boiteReponse1.dataset.reponse = "0";
  boiteReponse2.dataset.reponse = "0";
  boiteReponse3.dataset.reponse = "0";
  boiteReponse4.dataset.reponse = "0";
}

//###########################################################################
// le jeux commance
let bonneReponse = 1;

//#########################################################################
function playGame2(data)
{
 InitBackColorReponse(); // initialise le fond des reponses
  InitDataReponses(); // init la dataset
  InitDataReponsesBoite();
  btnSuivantInvisible();

  questionQuiz.innerText = data["question"];
  
  setQuestion(numQuestion + 1); // affiche le numero de question
  runTime(15); // demarage du chrono

      quizReponse1.innerText = data["reponses"][0]["reponse"];
      quizReponse2.innerText = data["reponses"][1]["reponse"];
      quizReponse3.innerText = data["reponses"][2]["reponse"];
      quizReponse4.innerText = data["reponses"][3]["reponse"];

      boiteReponse1.dataset.reponse = data["reponses"][0]["id"];
      boiteReponse2.dataset.reponse = data["reponses"][1]["id"];
      boiteReponse3.dataset.reponse  =data["reponses"][2]["id"];
      boiteReponse4.dataset.reponse = data["reponses"][3]["id"];
}



//###########################################################################
  

async function getQuestionAndReponses( data )
{
  let model = data.status ;
try{
    let reponse = await fetch("../src/getQuestionAndReponses",{method:"POST",
                            headers:{
                              "Content-Type":"application/json"
                                  },
                            body:JSON.stringify({status:model})});
      if(!reponse.ok)
          throw new Error("j'ai un probleme");     
        
    let data  = await reponse.json();
    if(data["status"]=="success")
      {
        console.log("cool");
    
        console.log(data["question"]);
        console.log(data["reponses"][0]["id"]);
        console.log(data["reponses"][0]["reponse"]);
        playGame2(data);
      }
 
    
}
catch(err)
{
      console.log( "un probleme");
}



}



//###########################################################################
// fonction pour ranger les ID et les questions associer
// fonction qui n'est plus utilisé
function questionRange(datas) {
  datas["questions"].forEach((tab) => {
    tab.forEach((elements, index) => {
      if (index == 0) questionsID.push(elements);
      if (index == 1) questionsEnonce.push(elements);
    });
  });
  console.log(`Debug : voila las ID ${questionsID}`);
  getReponses(questionsID);
}
//###########################################################################

//recupere les reponses a mes questions
// fonction qui n'est plus utilisé
async function getReponses(questions) {
  let objetIdQuestion = [{ status: "debug" }];
  questionsID.forEach((questionId) => {
    objetIdQuestion.push(Object.assign({}, { id: questionId }));
  });
  try {
    let reponses = await fetch("api/getReponses.php", {
      method: "POST",
      body: JSON.stringify(objetIdQuestion),
      headers: { "Content-type": "application/json" },
    });
    if (!reponses.ok) throw new Error("Une erreur est survenue");
    let data = await reponses.json();
    if (data["status"] == "success") {
      console.log(
        `debug :fichier game.js fonction getReponse.js : tout est ok : taille = ${data["taille"]}`,
      );
      reponsesAll = data["reponsesAll"];

      playGame();
    } else {
      console.log(
        `debug :fichier game.js fonction getReponse.js : Erreur taille = ${data["taille"]} `,
      );
    }
  } catch (err) {
    console.log("debug  game.js getReponse.js  : serveur erreur ");
  }
}
//###########################################################################

// Recupere le ID du Theme
async function getThemeQuestionsID(themeObjet) {
  try {
    let reponse = await fetch("../src/getThemeQuestionsID.php", {
      method: "POST",
      body: JSON.stringify(themeObjet),
      headers: {
        "Content-Type": "application/json",
      },
    });
    if (!reponse.ok) {
      throw new Error("une erreur du serveur c'est produite");
    }
    let data = await reponse.json();
    if (data["status"] === "success") {
      console.log(
        "debug:fichier game.js fonction getThemeQuestionID : super ca marche",
      );
      console.log(`info theme ${data["infoTheme"][0]}`);
      getThemeQuestionsForGame(data["infoTheme"][0]);
    } else {
      console.log("encore un probleme");
    }
  } catch (err) {
    console.log("une erreur c'est produite");
  }
}

//###########################################################################
// A partir du ID  initialisation des cinq question et leur reponses
// dans la super variable global php
async function getThemeQuestionsForGame(themeID) {
  let themeObjet = { theme: themeID, status: "debug" };
  try {
    let reponse = await fetch("../src/getThemeQuestionsForGame.php", {
      method: "POST",
      headers: { "Content-type": "application/json" },
      body: JSON.stringify(themeObjet),
    });
    if (!reponse.ok) throw new Error("erreur serveur");
    let data = await reponse.json();
    if (data["status"] === "success") {
      console.log(
        "Debug fichier game.js fonction getThemeQuestionForGame: tout c'est bien passe :",
      );
      getQuestionAndReponses({status:"question-reponses"}); // premier call
      // console.log(data["questions"][0]);
      // questionsAllInformations = data; // ici j'ai mes 5 questions ;
      // questionRange(data);
    } else {
      console.log("un probleme cote php");
    }
  } catch (err) {
    console.log("debug: getThemeQuestionsForGame : une erreur sur le serveur");
  }
}
// console.log(`valeur du theme ${themeChoisi.innerText}`);

//###########################################################################
// objet qui contient  le theme choisi

const objetTheme = {
  status: "debug",
  theme: themeChoisi.innerText,
};

getThemeQuestionsID(objetTheme);
