// LocalEvents.html - JavaScript
const eventData = [
    {
        name: "Anime Expo (LA)",
        date: "July 4-7, 2024",
        location: "1201 S Figueroa St, Los Angeles, CA",
        description: "Anime Expo, abbreviated AX, is an American anime convention held in Los Angeles, California and organized by the non-profit Society for the Promotion of Japanese Animation. The convention is traditionally held annually on the first weekend of July, spanning the course of four days.",
        imageURL: "images/AnimeExpo.jpg",
        link: "https://www.anime-expo.org/"
    },
    { 
        name: "Youmacon",
        date: "Oct. 31st - Nov. 3rd, 2024",
        location: "1 Washington Blvd, Detroit, MI",
        description: "Youmacon is an annual four-day anime convention held during November at Huntington Place in Detroit, Michigan, United States. Youmacon's creation was inspired by other conventions including Anime Central and Ohayocon, with the convention's name coming from the Japanese word for demon or ghost.",
        imageURL: "images/Youmacon.jpg",
        link: "https://www.anime-expo.org/",
    },
    {
        name: "Anime Matsuri",
        date: "Oct. 31st - Nov. 3rd, 2024",
        location: "1001 Avenida De Las Americas, Houston, TX",
        description: "Anime Matsuri is an annual four-day anime convention traditionally held during spring at the George R. Brown Convention Center in Houston, Texas. The convention's name comes from the Japanese word 'matsuri' meaning festival.",
        imageURL: "images/AnimeMatsuri.jpg",
        link:"https://animematsuri.com/home/"
    },
    { name: "AniMinneapolis",
    date: "Aug. 8th - 11th, 2024",
    location: "1300 Nicollet Mall, Minneapolis, MN",
    description: "AniMinneapolis provides you with a safe, exciting, fun place to make friends with people who share the same interests, as you participate in your choice of hundreds of different events. Over three days you can cosplay (optional), attend big events like concerts/dances/contests, play video games, and buy anime stuff.",
    imageURL: "images/AnimeMinneapolis.jpg",
    link: "https://animinneapolis.com/"
    },
    { name: "Ghibli Fest",
    date: "January 1st, 2024",
    location: "1234 Maple St. Tacoma, WA",
    description: "For decades Studio Ghibli has created breathtakingly beautiful  movies that have captivated and inspired audiences for generations  through masterful storytelling and stunning visuals. Join GKIDS and  Fathom Events for the annual Studio Ghibli Fest to experience the wonder  of these groundbreaking, beloved animated films.",
    imageURL: "images/studioGhibliFest.jpg",
    link: "https://www.fathomevents.com/series/studio-ghibli-fest/"
    },
]

const openEventContainer = document.querySelector('.open_event')
const listedEvents = document.querySelectorAll('.one_event');

listedEvents.forEach((event, index) => {
  event.addEventListener('click', () => {
    displayEventDetails(eventData[index]);
  });
});

function displayEventDetails(event) {
    const eventHTML = `
      <div class="title_img">
        <div class="inside_title_img">
          <h2><a href="${event.link}" target="_blank">${event.name}</a></h2>
          <div class="inner_text">
            <p>${event.date}</p>
            <p>${event.location}</p>
          </div>
        </div>
        <img class="open_img" src="${event.imageURL}" alt="Event Image">
      </div>
      <div class="open_paragraph">
        <p>${event.description}</p>
      </div>
    `;
  
    openEventContainer.innerHTML = eventHTML;
  }

// rate_my_anime.html - JavaScript

const voteCounts = [0, 0, 0, 0];

const shadeBackgrounds = document.querySelectorAll('.shaded_background');
const whiteBackgrounds = document.querySelectorAll('.white_background');
const numbers = document.querySelectorAll('.numbers');
const images = document.querySelectorAll('.image');

shadeBackgrounds.forEach((shadeBackground, index) => {
  shadeBackground.addEventListener('click', () => {
    if (localStorage.getItem('voted')) {
      const previousVoteIndex = localStorage.getItem('votedIndex');
      voteCounts[previousVoteIndex]--;
    }

    voteCounts[index]++;

    const sortedIndices = voteCounts.map((count, idx) => [count, idx])
      .sort((a, b) => b[0] - a[0])
      .map(pair => pair[1]);

    whiteBackgrounds.forEach((whiteBackground, idx) => {
      const sortedIndex = sortedIndices.indexOf(idx);
      whiteBackground.style.height = `${(sortedIndex + 1) * 25}%`;
    });

    numbers.forEach((number, idx) => {
      number.textContent = sortedIndices.indexOf(idx) + 1;
    });

    const ratingsContainer = document.querySelector('.ratings');
    const sortedShadeBackgrounds = Array.from(shadeBackgrounds)
      .sort((a, b) => sortedIndices.indexOf(Array.from(shadeBackgrounds).indexOf(a)) - sortedIndices.indexOf(Array.from(shadeBackgrounds).indexOf(b)));

    sortedShadeBackgrounds.forEach(shadeBackground => {
      ratingsContainer.appendChild(shadeBackground);
    });

    localStorage.setItem('voted', 'true');
    localStorage.setItem('votedIndex', index);
  });
});