$(".question-details__more").click((e) => {
  const open = $(".landing_header").hasClass("details__dropdown--active");
  open ? closeDetailsDropdown() : openDetailsDropdown();
});

const closeDetailsDropdown = () => {
  $(".landing_header").removeClass("details__dropdown--active");
  closeSharedLinks();
};

const openDetailsDropdown = () => {
  $(".landing_header").addClass("details__dropdown--active");
};
const openSharedLinks = () => {
  $(".details-share").addClass("details-share--visible");
  $(".details__dropdown").addClass("dn");
};
const closeSharedLinks = () => {
  $(".details-share").removeClass("details-share--visible");
  $(".details__dropdown").removeClass("dn");
};

const handleAnswerQuestionInput = (e) => {
  e.target.value.length > 0
    ? $(".answer-question__input").addClass("answer-question__input---typing")
    : $(".answer-question__input").removeClass("answer-question__input---typing");

};


$(".answer-question__input textarea").on("input", handleAnswerQuestionInput);
$(".details__overlay").on("click", closeDetailsDropdown);
$(".details__dropdown_item--share").on("click", openSharedLinks);
$(".details-share__header").on("click", closeDetailsDropdown);



// track textarea count

const countElm = $(".post-question-count");
const trackCount = (e) => {
  const remaining = 150 - e.target.value.length;
  countElm.text(remaining);
  if (remaining < 0) {
    countElm.addClass("redish1");
  } else {
    countElm.removeClass("redish1");
  }
};

$(".post-question-textarea").on("input", trackCount);

const $shareEl = $(".auto-share-toggle");

document.querySelector(".auto-share-checkbox") && document.querySelector(".auto-share-checkbox").checked
  ? $shareEl.show()
  : $shareEl.hide();

// autoshare
$(".auto-share-checkbox").on("change", (e) => {
  if (e.target.checked) {
    $shareEl.show();
  } else {
    $shareEl.hide();
  }
});

// share-social
$(".share-social").on("click", () => {
  console.log("here");
});

let clicking = false;
let pressTimer 

$(".open-question__response").on("mousedown", (e) => {
  clicking = true;
  pressTimer = setTimeout(() => {
    if (clicking) {
      console.log("long press");
      let votes = e.currentTarget.querySelector(".response-votes");
      votes.textContent = parseInt(votes.textContent) - 1;
    }
  }, 2000);
});

$(".open-question__response").on("mouseup", (e) => {
  let voted = e.currentTarget.getAttribute("data-voted");
  console.log("voted", voted);

  if (!longclick) {
    console.log("short press");
    // handle short click
    let votes = e.currentTarget.querySelector(".response-votes");
    if (voted) {
      votes.textContent = parseInt(votes.textContent) - 1;
      e.currentTarget.removeAttribute("data-voted");
    } else {
      votes.textContent = parseInt(votes.textContent) + 1;
      e.currentTarget.setAttribute("data-voted", true);
    }
  }

  clicking = false;
  clearTimeout(pressTimer)
});


