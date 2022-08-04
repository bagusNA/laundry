export function dateFormat(timestamp: string): string {
  const dayString = [
    'Min', 
    'Sen', 'Sel', 
    'Rab', 'Kam', 
    'Jum', 'Sab'
  ];
  const monthString = [
    'Jan', 'Feb', 'Mar', 
    'Apr', 'Mei', 'Jun', 
    'Jul', 'Agu', 'Sep',
    'Okt', 'Nov', 'Des',
  ];

  const date = new Date(timestamp);
  
  const calDate = date.getDate();
  const day = dayString[date.getDay()];
  const month = monthString[date.getMonth()];
  const year = date.getFullYear();

  return `${day}, ${calDate} ${month} ${year}`;
}