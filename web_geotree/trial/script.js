$(document).ready(function() {
    $('#proposalTable').DataTable({
      "paging": false, // Disable pagination for a cleaner look
      "searching": true // Enable basic search functionality
    });
  
    // Mock data (replace with your actual data retrieval logic)
    let mockData = [
      ["123", "John Doe", "ABC123", "Pruning", "Dead branches", "Approved"],
      ["456", "Jane Smith", "DEF456", "Planting", "New neighborhood park", "Pending"],
      ["789", "Michael Lee", "GHI789", "Disease Control", "Signs of insect infestation", "In Progress"]
    ];
  
    // Add mock data to the table body
    $('#proposalTable tbody').append(mockData.map(row => `<tr><td>${row[0]}</td><td>${row[1]}</td><td>${row[2]}</td><td>${row[3]}</td><td>${row[4]}</td><td>${row[5]}</td></tr>`));
  });
  