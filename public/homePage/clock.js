// // Function to initialize a clock
// function initializeClock(clockId, timezoneOffset) {
//     const clock = document.getElementById(clockId);
//     const hourHand = clock.querySelector('.hour');
//     const minuteHand = clock.querySelector('.minute');
//     const secondHand = clock.querySelector('.second');
//
//     function rotate() {
//         const currentDate = new Date();
//         const utcDate = new Date(currentDate.getTime() + (currentDate.getTimezoneOffset() * 60000));
//         const localDate = new Date(utcDate.getTime() + (timezoneOffset * 3600000));
//
//         const hours = localDate.getHours();
//         const minutes = localDate.getMinutes();
//         const seconds = localDate.getSeconds();
//
//         const secondsFraction = seconds / 60;
//         const minutesFraction = (secondsFraction + minutes) / 60;
//         const hoursFraction = (minutesFraction + hours) / 12;
//
//         const secondsRotate = secondsFraction * 360;
//         const minutesRotate = minutesFraction * 360;
//         const hoursRotate = hoursFraction * 360;
//
//         secondHand.style.transform = `rotate(${secondsRotate}deg)`;
//         minuteHand.style.transform = `rotate(${minutesRotate}deg)`;
//         hourHand.style.transform = `rotate(${hoursRotate}deg)`;
//     }
//
//     setInterval(rotate, 1000);
// }
//
// // Initialize clocks with respective time zone offsets
// initializeClock('clock-dc', -4); // D.C. (UTC-4)
// initializeClock('clock-bxl', 2); // BXL (UTC+2)
// initializeClock('clock-lagos', 1); // Lagos (UTC+1)
// initializeClock('clock-dubai', 4); // Dubai (UTC+4)
// initializeClock('clock-beijing', 8); // Beijing (UTC+8)
// initializeClock('clock-sg', 8); // Singapore (UTC+8)
//
// // Initialize clocks with respective time zone offsets
// initializeClock('clock-dc-1', -4); // D.C. (UTC-4)
// initializeClock('clock-bxl-1', 2); // BXL (UTC+2)
// initializeClock('clock-lagos-1', 1); // Lagos (UTC+1)
// initializeClock('clock-dubai-1', 4); // Dubai (UTC+4)
// initializeClock('clock-beijing-1', 8); // Beijing (UTC+8)
// initializeClock('clock-sg-1', 8); // Singapore (UTC+8)
//
// // Initialize clocks with respective time zone offsets
// initializeClock('clock-dc-2', -4); // D.C. (UTC-4)
// initializeClock('clock-bxl-2', 2); // BXL (UTC+2)
// initializeClock('clock-lagos-2', 1); // Lagos (UTC+1)
// initializeClock('clock-dubai-2', 4); // Dubai (UTC+4)
// initializeClock('clock-beijing-2', 8); // Beijing (UTC+8)
// initializeClock('clock-sg-2', 8); // Singapore (UTC+8)

// Function to initialize a clock
function initializeClock(clockId, timezoneOffset) {
    const clock = document.getElementById(clockId);
    const hourHand = clock.querySelector('.hour');
    const minuteHand = clock.querySelector('.minute');
    const secondHand = clock.querySelector('.second');

    function rotate() {
        const currentDate = new Date();
        const utcDate = new Date(currentDate.getTime() + (currentDate.getTimezoneOffset() * 60000));
        const localDate = new Date(utcDate.getTime() + (timezoneOffset * 3600000));

        const hours = localDate.getHours();
        const minutes = localDate.getMinutes();
        const seconds = localDate.getSeconds();

        const secondsFraction = seconds / 60;
        const minutesFraction = (secondsFraction + minutes) / 60;
        const hoursFraction = (minutesFraction + hours) / 12;

        const secondsRotate = secondsFraction * 360;
        const minutesRotate = minutesFraction * 360;
        const hoursRotate = hoursFraction * 360;

        secondHand.style.transform = `rotate(${secondsRotate}deg)`;
        minuteHand.style.transform = `rotate(${minutesRotate}deg)`;
        hourHand.style.transform = `rotate(${hoursRotate}deg)`;
    }

    setInterval(rotate, 1000);
}

// Initialize clocks with respective time zone offsets
initializeClock('clock-dc', -5); // Baton Rouge, Louisiana (UTC-5 during DST)
initializeClock('clock-bxl', -5); // Jackson, Mississippi (UTC-5 during DST)
initializeClock('clock-lagos', -5); // Montgomery, Alabama (UTC-5 during DST)
initializeClock('clock-dubai', -4); // Atlanta, Georgia (UTC-4 during DST)
initializeClock('clock-beijing', -4); // Columbia, South Carolina (UTC-4 during DST)
initializeClock('clock-sg', -4); // Raleigh, North Carolina (UTC-4 during DST)


// Initialize clocks with respective time zone offsets
initializeClock('clock-dc-1', -5); // Baton Rouge, Louisiana (UTC-5 during DST)
initializeClock('clock-bxl-1', -5); // Jackson, Mississippi (UTC-5 during DST)
initializeClock('clock-lagos-1', -5); // Montgomery, Alabama (UTC-5 during DST)
initializeClock('clock-dubai-1', -4); // Atlanta, Georgia (UTC-4 during DST)
initializeClock('clock-beijing-1', -4); // Columbia, South Carolina (UTC-4 during DST)
initializeClock('clock-sg-1', -4); // Raleigh, North Carolina (UTC-4 during DST)


// Initialize clocks with respective time zone offsets
initializeClock('clock-dc-2', -5); // Baton Rouge, Louisiana (UTC-5 during DST)
initializeClock('clock-bxl-2', -5); // Jackson, Mississippi (UTC-5 during DST)
initializeClock('clock-lagos-2', -5); // Montgomery, Alabama (UTC-5 during DST)
initializeClock('clock-dubai-2', -4); // Atlanta, Georgia (UTC-4 during DST)
initializeClock('clock-beijing-2', -4); // Columbia, South Carolina (UTC-4 during DST)
initializeClock('clock-sg-2', -4); // Raleigh, North Carolina (UTC-4 during DST)


/* Baton Rouge (Louisiana)

Jackson (Mississippi)

Montgomery (Alabama)

Atlanta (Georgia)

Columbia (South Carolina)

Raleigh (North Carolina)*/
